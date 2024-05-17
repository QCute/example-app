<?php

namespace App\Admin\Models\Admin;

use App\Admin\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RoleModel extends Model
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
    protected $table = 'role';

    public function __construct(array $attributes = [])
    {
        $this->table = config('admin.database.role_table');

        parent::__construct($attributes);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(PermissionModel::class, config('admin.database.role_permission_table'), 'role_id', 'id');
    }

    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(MenuModel::class, config('admin.database.role_menu_table'), 'role_id', 'id');
    }
}
