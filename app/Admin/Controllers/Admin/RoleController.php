<?php

namespace App\Admin\Controllers\Admin;

use App\Admin\Builders\Form;
use App\Admin\Builders\Table;
use App\Admin\Builders\Table\Header;
use App\Admin\Builders\Table\Page;
use App\Admin\Controllers\Controller;
use App\Admin\Models\Admin\MenuModel;
use App\Admin\Models\Admin\PermissionModel;
use App\Admin\Models\Admin\RoleModel;
use App\Admin\Models\Admin\RolePermissionModel;
use App\Admin\Models\Admin\RoleMenuModel;
use App\Admin\Models\Model;
use App\Admin\Services\Auth\AuthService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller 
{
    public function index(Request $request)
    {
        $form = new Form();
        $form->hide();

        $form
            ->text('id')
            ->label(trans('admin.id'));
        $form
                ->text('name')
                ->label(trans('admin.role.name'));
        $form
            ->text('tag')
            ->label(trans('admin.role.tag'));
        $form
            ->dateRange('created_time')
            ->label(trans('admin.time.created.at'));
        $form
            ->dateRange('updated_time')
            ->label(trans('admin.time.updated.at'));

        $header = [
            (new Header())->field('id')->title(trans('admin.role.id'))->align()->width(32),
            (new Header())->field('name')->title(trans('admin.role.name'))->align()->width(160),
            (new Header())->field('tag')->title(trans('admin.role.tag'))->align()->width(160),
            (new Header())->field('permissions')->title(trans('admin.role.permissions'))->align()->templet('tags', 'name'),
            (new Header())->field('menus')->title(trans('admin.role.menus'))->align()->templet('tags', 'name'),
            (new Header())->field(Model::CREATED_AT)->title(trans('admin.time.created.at'))->align()->width(160),
            (new Header())->field(Model::UPDATED_AT)->title(trans('admin.time.updated.at'))->align()->width(160),
            (new Header())->field('')->title(trans('admin.table.operate'))->align()->width(220)->toolbar(),
        ];

        $page = $request->input('page', 1);
        $perPage = $request->input('perPage', 10);
        $input = $request->except(['_token', 'page', 'perPage']);
        $paginator = RoleModel::getPage($page, $perPage, $input);
        $data = $paginator->items();

        $paginate = (new Page())
            ->total($paginator->total())
            ->current($page)
            ->limit($perPage);

        return (new Table())
            ->form($form)
            ->header($header)
            ->data($data)
            ->right(['filter', 'create', 'download', 'export', 'search'])
            ->operation(['show', 'edit', 'delete'])
            ->paginate($paginate)
            ->build();
    }

    public function create(Request $request)
    {
        $form = new Form();

        $form
            ->text('name')
            ->label(trans('admin.role.name'))
            ->required();
        $form
            ->text('tag')
            ->label(trans('admin.role.tag'))
            ->required();

        $user = AuthService::user();
        $transfer = $form
            ->transfer('permissions')
            ->label(trans('admin.role.permissions'))
            ->title(trans('admin.role.permissions'), trans('admin.role.permissions'));

        foreach ($user->roles->map(function($role) { return $role->permissions; })->flatten() as $permission) {
            $transfer->left()->label($permission->name)->value($permission->id);
        }

        $transfer = $form
            ->transfer('menus')
            ->label(trans('admin.role.menus'))
            ->title(trans('admin.role.menus'), trans('admin.role.menus'));

        foreach ($user->roles->map(function($role) { return $role->menus; })->flatten() as $menu) {
            $transfer->left()->label($menu->name)->value($menu->id);
        }

        return $form->name(trans('admin.form.create'))->build();
    }

    public function store(Request $request)
    {
        $permissions = $request->input('permissions') ?? [];
        $permissions = PermissionModel::findMany($permissions);

        $menus = $request->input('menus') ?? [];
        $menus = MenuModel::findMany($menus);

        DB::beginTransaction();
        try {
            $attributes = [
                'name' => $request->input('name'),
                'tag' => $request->input('tag'),
            ];

            $role = RoleModel::withOnly([])->create($attributes);

            $rolePermissions = $permissions
                ->map(function($permission) use ($role) { 
                    return ['role_id' => $role->id, 'permission_id' => $permission->id]; 
                })
                ->toArray();

            RolePermissionModel::insert($rolePermissions);

            $roleMenus = $menus
                ->map(function($menu) use ($role) { 
                    return ['role_id' => $role->id, 'menu_id' => $menu->id]; 
                })
                ->toArray();

            RoleMenuModel::insert($roleMenus);

            collect($roleMenus)->forEach(function($menu) {
                MenuModel::where('id', '=', $menu['menu_id'])->update(['permission' => 'ROLE']);
            });

            DB::commit();
        } catch(Exception $exception) {
            DB::rollBack();

            return ['code' => $exception->getCode(), 'msg' => $exception->getMessage()];
        }
    
        return ['code' => 0, 'msg' => ''];
    }

    public function show(Request $request, int $id)
    {
        $data = RoleModel::withOnly([])->find($id);

        $form = new Form();

        $form
            ->display('id')
            ->label(trans('admin.role.id'))
            ->value($data->id);
        $form
            ->display('name')
            ->label(trans('admin.role.name'))
            ->value($data->name);
        $form
            ->display('tag')
            ->label(trans('admin.role.tag'))
            ->value($data->tag);

        $permissions = $form
            ->tags('permissions')
            ->label(trans('admin.role.permissions'));

        foreach($data->permissions as $permission) {
            $permissions->tag()->value($permission->name);
        }

        $menus = $form
            ->tags('menus')
            ->label(trans('admin.role.menus'));

        foreach($data->menus as $menu) {
            $menus->tag()->value($menu->name);
        }
    
        return $form->name(trans('admin.form.show'))->build();
    }

    public function edit(Request $request, int $id)
    {
        $data = RoleModel::withOnly([])->find($id);

        $form = new Form();

        $form
            ->display('id')
            ->label(trans('admin.role.id'))
            ->value($data->id)
            ->required();
        $form
            ->text('name')
            ->label(trans('admin.role.name'))
            ->value($data->name)
            ->required();
        $form
            ->text('tag')
            ->label(trans('admin.role.tag'))
            ->value($data->tag)
            ->required();
        $form
            ->multipleSelect('permissions')
            ->label(trans('admin.role.permissions'))
            ->value($data->permissions)
            ->required();
        $form
            ->multipleSelect('menus')
            ->label(trans('admin.role.menus'))
            ->value($data->menus)
            ->required();
    
        return $form->name(trans('admin.form.edit'))->method('PATCH')->build();
    }

    public function update(Request $request, int $id)
    {
        $role = RoleModel::withOnly(['permissions', 'menus'])->find($id);

        $permissions = $request->input('permissions') ?? [];
        $permissions = PermissionModel::findMany($permissions);

        $menus = $request->input('menus') ?? [];
        $menus = MenuModel::findMany($menus);

        DB::beginTransaction();
        try {
            $attributes = [
                'name' => $request->input('name'),
                'avatar' => $request->input('tag'),
            ];

            RoleModel::withOnly([])->where('id', '=', $id)->update($attributes);

            $permissionCreate = $permissions
                ->filter(function($permission) use ($role) {
                    return is_null($role->permission->find($permission->id));
                })
                ->map(function($permission) use ($role) {
                    return ['role_id' => $role->id, 'permission_id' => $permission->id];
                })
                ->toArray();

            RolePermissionModel::insert($permissionCreate);

            $permissionDestroy = $role
                ->permissions
                ->filter(function($permission) use ($permissions) {
                    return is_null($permissions->find($permission->id));
                })
                ->map(function($permission) {
                    return $permission->pivot->id;
                })
                ->toArray();

            RolePermissionModel::destroy($permissionDestroy);

            $menuCreate = $menus
                ->filter(function($menu) use ($role) {
                    return is_null($role->menu->find($menu->id));
                })
                ->map(function($menu) use ($role) {
                    return ['role_id' => $role->id, 'menu_id' => $menu->id];
                })
                ->toArray();

            RoleMenuModel::insert($menuCreate);

            collect($menuCreate)->forEach(function($menu) {
                MenuModel::where('id', '=', $menu['menu_id'])->update(['permission' => 'ROLE']);
            });

            $menuDestroy = $role
                ->menus
                ->filter(function($menu) use ($menus) {
                    return is_null($menus->find($menu->id));
                })
                ->map(function($menu) {
                    return $menu->pivot->id;
                })
                ->toArray();

            RoleMenuModel::destroy($menuDestroy);

            // todo update menu permission

            DB::commit();
        } catch(Exception $exception) {
            DB::rollBack();

            return ['code' => $exception->getCode(), 'msg' => $exception->getMessage()];
        }
    
        return ['code' => 0, 'msg' => ''];
    }

    public function destroy(Request $request, int $id)
    {
        RoleModel::destroy($id);

        return ['code' => 0, 'msg' => ''];
    }
}
