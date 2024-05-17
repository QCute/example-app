<?php

namespace App\Admin\Controllers\Extend;

use App\Admin\Controllers\Controller;
use App\Admin\Models\Admin\MenuModel;
use App\Admin\Services\Auth\AuthService;

class ConfigController extends Controller
{
    public function index(string $data) 
    {
        return $this->{$data}();
    }

    public function get()
    {
        $vendor = config('admin.vendor.framework');
        $config = config('admin.vendor.config.file');
        $config = file_get_contents(public_path($vendor . '/' . $config));
        $config = json_decode($config);

        $path = request()->input('path');
        $prefix = '/' . config('admin.route.prefix');
        $path = $path == $prefix ? '/' : substr($path, strlen($prefix));
        $user = AuthService::user();
        $menu = MenuModel::findMenu($user, $path) ?? (object)['id' => 1, 'url' => '/', 'title' => config('admin.name')];

        // logo
        $config->logo->title = config('admin.name') ?? $config->logo->title;
        $config->logo->image = config('admin.logo') ?? admin_asset($config->logo->image);

        // fill menu
        $config->menu->select = $menu->id;
        $config->menu->data = $prefix . '/config/menu';

        // fill tab
        $config->tab->enable = false;
        $config->tab->index->id = $menu->id;
        $config->tab->index->title = $menu->title;
        $config->tab->index->href = $prefix . $menu->url;

        // theme
        $config->theme->allowCustom = false;

        // header message
        $config->header->message = false;

        return $config;
    }

    public function menu()
    {
        $prefix = '/' . config('admin.route.prefix');

        $user = AuthService::user();

        // collect roles menu list
        $menus = MenuModel::getMenus($user);

        $mapMenu = function($menu) use ($prefix, &$mapMenu) {

            $menu->href = $prefix . $menu->url;
            unset($menu->url);
            unset($menu->role);
            unset($menu->permission);
            unset($menu->{\App\Admin\Models\Model::CREATED_AT});
            unset($menu->{\App\Admin\Models\Model::UPDATED_AT});
            unset($menu->{\App\Admin\Models\Model::DELETED_AT});

            $menu->children->map($mapMenu);

            return $menu;
        };

        $menus = $menus->map($mapMenu);

        return array_values($menus->toArray());
    }
}
