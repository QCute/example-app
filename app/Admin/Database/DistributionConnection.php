<?php

namespace App\Admin\Database;

use App\Admin\Services\Extend\ChannelService;
use App\Admin\Services\Extend\DatabaseService;
use App\Admin\Services\Extend\ServerService;
use Illuminate\Database\MySqlConnection;
use Illuminate\Support\Facades\DB;
use stdClass;

class DistributionConnection extends MySqlConnection
{
    /**
     * The rules.
     *
     * @var array
     */
    private $rules;

    public function __construct(array $rules)
    {
        $this->rules = $rules;

        // dummp connection pdo
        $connection = DatabaseService::getConnection();
        $pdo = $connection->getPdo();
        // $tablePrefix = $connection->getTablePrefix();
        // $database = $connection->getDatabaseName();
        $config = $connection->getConfig();

        parent::__construct($pdo, '', '', $config);
    }

    /**
     * Run a select statement against the database.
     *
     * @param  string  $query
     * @param  array  $bindings
     * @param  bool  $useReadPdo
     * @return array
     */
    public function select($query, $bindings = [], $useReadPdo = true)
    {
        $channels = [];
        $channel = ChannelService::getChannel();
        if(is_null($channel)) {
            return [];
        }

        if($channel->tag == 'ALL') {
            // all channels
            $channels = ChannelService::getChannels();
        } else {
            // this channel
            $channels = collect([$channel]);
        }

        $servers = [];
        $server = ServerService::getServer();
        if($server->tag == 'ALL') {
            // all/this channel all server
            $servers = $channels->map(function($channel) { return $channel->servers; })->flatten();
        } else {
            // all/this channel this server
            $servers = collect([$server]);
        }

        $acc = [];
        $sql = self::parse($query);

        foreach($servers as $server) {

            if($server->tag == 'ALL') continue;

            // change connection
            $this->setDatabaseName($server->db_name);
            $this->setPdo(DatabaseService::changePDO($server, $this->getConfig()));

            // fetch from database
            $data = parent::select($query, $bindings, $useReadPdo);

            // fold data
            $acc = $this->groupBy($sql, $acc, $data);
            // dump($acc);
            $acc = $this->orderBy($sql, $acc);
            // dump($acc);
            // $acc = $this->offset($sql, $acc);
            // dump($acc);
            // $result = $this->limit($sql, $acc);

            // $acc = $result->data;
            // dump($acc);
            // if($result->status == 1) break;
        }

        // if(!empty($sql->group) || !empty($sql->order)) {
        //     $sql->group = [];
        //     $sql->order = [];

        //     $acc = $this->offset($sql, $acc);
        //     $result = $this->limit($sql, $acc);

        //     $acc = $result->data;
        // }
        // dump($servers, $query, $bindings, $sql, $acc);
        return array_values($acc);
    }

    public static function parse(string $query)
    {
        $quote = '';
        $acc = '';
        $list = [];

        foreach (mb_str_split($query) as $char) {
            switch($char) {
                case '`':
                case '\'': 
                case '"': {

                    $pre = mb_substr($acc, -1);

                    $acc .= $char;

                    if($quote == $char) {

                        if($pre == '\\') {
                            break;
                        }

                        $list[] = $acc;
                        $quote = '';
                        $acc = '';

                        break;
                    }

                    $quote = $char;
                };break;
                case ',':
                case '(':
                case ')': {
                    $list[] = $char;
                };break;
                case ' ': {
                    if($quote !== '') {
                        $acc .= $char;
                        break;
                    }

                    if($acc !== '') {
                        $list[] = $acc;
                        $acc = '';
                        break;
                    }

                };break;
                default: {
                    $acc .= $char;
                }
            }
        }

        if($acc !== '') {
            $list[] = $acc;
            $acc = '';
        }

        $pre = '';
        $quote = 0;
        $operate = '';
        $sql = [
            'row' => 0,
            'where' => [],
            'group' => [],
            'having' => [],
            'order' => [],
            'limit' => null,
            'offset' => null,
        ];

        foreach($list as $block) {
            switch ($block) {
                case '(': {
                    $quote++;
                };break;
                case ')': {
                    $quote--;
                };break;
                case 'group':
                case 'order': {
                    if($quote > 0) {
                        break;
                    }
                    $operate = $block;
                };break;
                case 'by':break;
                case 'asc':
                case 'desc': {
                    if($quote > 0) {
                        break;
                    }

                    if($operate === '') {
                        break;
                    }

                    if($pre === '') {
                        break;
                    }

                    $sql[$operate][$pre] = $block;
                    $pre = '';
                };break;
                case 'having': {
                    $operate = '';
                }break;
                case 'limit':
                case 'offset': {
                    if($operate == 'order' && $pre !== '') {
                        $sql[$operate][$pre] = 'asc';
                    }

                    $operate = $block;
                };break;
                default: {
                    if($quote > 0) {
                        break;
                    }

                    if($operate === '') {
                        break;
                    }

                    if($operate == 'order') {
                        $pre = trim($block, '`');
                        break;
                    }

                    if($operate == 'limit') {

                        if(is_null($sql[$operate])) {
                            $sql[$operate] = intval($block);
                        } else {
                            $sql['offset'] = intval($block);
                        }

                        break;
                    }

                    if($operate == 'offset') {
                        $sql[$operate] = intval($block);
                        break;
                    }

                    $sql[$operate][] = trim($block, '`');
                }
            }
        }

        return (object)$sql;
    }

    /**
     * Run a select group by statement against the database.
     *
     * @param  object  $sql
     * @param  array  $acc
     * @param  array  $data
     * @return array
     */
    public function groupBy(object &$sql, array $acc, array $data)
    {
        if(empty($sql->group)) {
            return array_merge($acc, $data);
        }

        // update data into acc
        foreach ($data as $item) {

            // union key
            $key = implode('-', array_map(function ($name) use ($item) {
                return $name . ':' . $item->{$name}; }, $sql->group));
            $row = $acc[$key] ?? null;

            if (is_null($row)) {
                $acc[$key] = $item;
                continue;
            }

            // merge each property
            foreach ($item as $name => $value) {

                // skip key
                if (in_array($name, $sql->group)) {
                    continue;
                }

                // custom rules
                $rule = $this->rules[$name] ?? null;
                if (!is_null($rule)) {
                    $row->{$name} = call_user_func($rule, $row->{$name}, $value);
                    continue;
                }

                // plus by default
                $row->{$name} += $value;
            }

            // update
            $acc[$key] = $row;
        }

        return $acc;
    }

    /**
     * Run a select order by statement against the database.
     *
     * @param  object  $sql
     * @param  array  $acc
     * @return array
     */
    public function orderBy(object &$sql, array $acc)
    {
        if(empty($sql->order)) {
            return $acc;
        }

        usort($acc, function ($x, $y) use ($sql) {
            $flag = false;

            foreach ($sql->order as $name => $order) {

                if ($order == 'asc') {
                    $flag = $flag && $x->{$name} > $y->{$name};
                } else {
                    $flag = $flag && $x->{$name} < $y->{$name};
                }

            }

            return $flag;
        });

        return $acc;
    }

    /**
     * Run a select offset statement against the database.
     *
     * @param  object  $sql
     * @param  array  $acc
     * @return array
     */
    public function offset(object &$sql, array $acc)
    {
        if(!empty($sql->group)) {
            return $acc;
        }

        if(!empty($sql->order)) {
            return $acc;
        }

        if(is_null($sql->offset)) {
            return $acc;
        }

        $sql->row += count($acc);
        $offset = $sql->row - $sql->offset;

        if($offset >= 0) {
            $acc = array_slice($acc, $offset);
        } else {
            $acc = [];
        }

        return $acc;
    }

    /**
     * Run a select limit statement against the database.
     *
     * @param  object  $sql
     * @param  array  $acc
     * @return object
     */
    public function limit(object &$sql, array $acc)
    {
        $result = new stdClass();
        $result->data = $acc;

        if(!empty($sql->group)) {
            $result->status = 0;
            return $result;
        }

        if(!empty($sql->order)) {
            $result->status = 0;
            return $result;
        }

        if(is_null($sql->offset)) {
            $result->status = 0;
            return $result;
        }

        if($sql->limit < count($acc)) {
            $result->status = 0;
            return $result;
        }

        $acc = array_slice($acc, 0, $sql->limit);

        // stop
        $result->status = 1;
        return $result;
    }
}
