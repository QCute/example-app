<?php

namespace App\Admin\Models\Admin;

use App\Admin\Models\Model;
use Illuminate\Database\Eloquent\Collection;

class UserPermissionModel extends Model
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
    protected $table = 'user_permission';

    public function __construct(array $attributes = [])
    {
        $this->table = config('admin.database.user_permission_table');

        parent::__construct($attributes);
    }
}
