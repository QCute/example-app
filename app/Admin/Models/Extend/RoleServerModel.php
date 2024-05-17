<?php

namespace App\Admin\Models\Extend;

use App\Admin\Models\Model;
use App\Admin\Models\Admin\RoleModel;
use Illuminate\Database\Eloquent\Collection;

class RoleServerModel extends Model
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
    protected $table = 'role_server';

    public function __construct(array $attributes = [])
    {
        $this->table = config('extend.database.role_server_table');

        parent::__construct($attributes);
    }
}
