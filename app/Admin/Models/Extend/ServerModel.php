<?php

namespace App\Admin\Models\Extend;

use App\Admin\Models\Admin\UserModel;
use App\Admin\Models\Model;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServerModel extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string|null
     */
    protected $connection = 'extend';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'server';

    public function __construct(array $attributes = [])
    {
        $this->table = config('extend.database.server_table');

        parent::__construct($attributes);
    }

    public static function getPage(int $page, int $perPage, array $input = []): LengthAwarePaginator
    {
        return (new static())->withInput($input)->paginate($perPage, ['*'], 'page', $page);
    }

    public static function getServer(int $channel_id, int $server_id): ServerModel|null
    {
        return (new static())
            ->where('id', '=', $server_id)
            ->withWhereHas('channels', function (Builder $query) use ($channel_id, $server_id) {
                return $query
                    ->where('channel_id', '=', $channel_id)
                    ->where('server_id', '=', $server_id);
            })
            ->first();
    }

    public static function getServers(UserModel $user)
    {
        $roles = collect($user->roles)->map(function($role) { return $role->id; });

        return (new static())
            ->withWhereHas('roles', function (Builder $query) use ($roles) {
                return $query->whereIn('role_id', $roles);
            })
            ->withWhereHas('channels', function (Builder $query) use ($roles) {
                return $query
                    ->withWhereHas('roles', function(Builder $query) use ($roles) {
                        return $query->whereIn('role_id', $roles);
                    })
                    ->orWhere('permission', '=', '');
            })
            ->orWhere('permission', '=', '')
            ->get()
            ->keyBy('id');
    }

    public function roles(): HasMany
    {
        return $this->hasMany(RoleServerModel::class, 'server_id', 'id');
    }

    public function channels(): BelongsToMany
    {
        return $this->belongsToMany(ChannelModel::class, config('extend.database.channel_server_table'), 'server_id', 'channel_id');
    }

    public function getChannelAttribute() : ChannelModel|null
    {
        return $this->channels[0] ?? null;
    }
}
