<?php

namespace App\Admin\Models\Admin;

use App\Admin\Models\Model;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MenuModel extends Model
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
    protected $table = 'menu';

    public function __construct(array $attributes = [])
    {
        $this->table = config('admin.database.menu_table');

        parent::__construct($attributes);
    }

    public static function findMenu(UserModel $user, string $path): MenuModel|null
    {
        $roles = collect($user->roles)->map(function($role) { return $role->id; });

        return (new static())
            ->withWhereHas('role', function (Builder $query) use ($roles) {
                return $query->whereIn('role_id', $roles);
            })
            ->with('children')
            ->orWhere('permission', '=', '')
            ->where('url', '=', $path)
            ->orderBy('order')
            ->first();
    }

    public static function getMenus(UserModel $user): Collection
    {
        $roles = collect($user->roles)->map(function($role) { return $role->id; });

        return (new static())
            ->withWhereHas('role', function (Builder $query) use ($roles) {
                return $query->whereIn('role_id', $roles);
            })
            ->with('children')
            ->orWhere('permission', '=', '')
            ->where('parent_id', '=', 0)
            ->orderBy('order')
            ->get()
            ->keyBy('id');
    }

    public static function getPage(int $page, int $perPage, array $input = []): LengthAwarePaginator
    {
        return (new static())->withInput($input)->paginate($perPage, ['*'], 'page', $page);
    }

    public function role(): HasMany
    {
        return $this->hasMany(RoleMenuModel::class, 'menu_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(MenuModel::class, 'parent_id', 'id');
    }
}
