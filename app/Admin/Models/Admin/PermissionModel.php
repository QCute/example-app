<?php

namespace App\Admin\Models\Admin;

use App\Admin\Models\Model;

class PermissionModel extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string|null
     */
    protected $connection = 'admin';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permission';

    public function __construct(array $attributes = [])
    {
        $this->table = config('admin.database.permission_table');

        parent::__construct($attributes);
    }
}
