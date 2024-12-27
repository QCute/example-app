<?php

namespace App\Admin\Controllers\Extend;

use App\Admin\Controllers\Controller;
use App\Admin\Models\Admin\MenuModel;
use App\Admin\Models\Extend\ChannelModel;
use App\Admin\Services\Auth\AuthService;
use App\Admin\Services\Extend\ChannelService;
use App\Admin\Services\Extend\ServerService;
use App\Api\Models\ServerModel;

class IndexController extends Controller
{
    public function index()
    {
        $channels = ChannelService::getChannels();

        $channel = ChannelService::getChannel();

        $server = ServerService::getServer();

        $data = [
            'channels' => $channels, 
            'channel' => $channel, 
            'server' => $server, 
        ];

        return admin_view('index', $data);
    }

    public function root()
    {
        $channels = ChannelService::getChannels();

        $channel = ChannelService::getChannel();

        $server = ServerService::getServer();

        $user = AuthService::user();

        // collect roles menu list
        $menus = MenuModel::getMenus($user);
        $mapMenu = function($menu) use (&$mapMenu) {

            $menu->href = admin_path($menu->url);
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

        $path = request()->input('path');
        // "" or "/prefix"
        $prefix = config('admin.route.prefix');
        $prefix = $prefix === '' ? $prefix : '/' . $prefix;

        $path = $path == $prefix ? '/' : substr($path, strlen($prefix));
        $user = AuthService::user();
        $select = MenuModel::findMenu($user, $path) ?? (object)['id' => 1, 'url' => '/', 'title' => config('admin.name')];

        $data = [
            'channels' => $channels, 
            'channel' => $channel, 
            'server' => $server, 
            'menus' => $menus, 
            'select' => $select,
        ];

        return admin_view('new', $data);
    }

    public function config()
    {
        $vendor = config('admin.vendor.framework');
        $config = config('admin.vendor.config.file');
        $config = file_get_contents(public_path($vendor . '/' . $config));
        $config = json_decode($config);

        $path = request()->input('path');
        // "" or "/prefix"
        $prefix = config('admin.route.prefix');
        $prefix = $prefix === '' ? $prefix : '/' . $prefix;

        $path = $path == $prefix ? '/' : substr($path, strlen($prefix));
        $user = AuthService::user();
        $menu = MenuModel::findMenu($user, $path) ?? (object)['id' => 1, 'url' => '/', 'title' => config('admin.name')];

        // logo
        $config->logo->title = config('admin.name') ?? $config->logo->title;
        $config->logo->image = config('admin.logo') ?? admin_asset($config->logo->image);

        // fill menu
        $config->menu->select = $menu->id;
        $config->menu->data = admin_path('/menu');

        // fill tab
        $config->tab->enable = false;
        $config->tab->index->id = $menu->id;
        $config->tab->index->title = $menu->title;
        $config->tab->index->href = admin_path($menu->url);

        // theme
        $config->theme->allowCustom = false;

        // header message
        $config->header->message = false;

        return $config;
    }

    public function menu()
    {
        $user = AuthService::user();

        // collect roles menu list
        $menus = MenuModel::getMenus($user);

        $mapMenu = function($menu) use (&$mapMenu) {

            $menu->href = admin_path($menu->url);
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

    public function refresh() 
    {
        $attributes = ChannelModel::all()
            ->filter(function($channel) {
                return $channel->tag != 'ALL';
            })
            ->map(function($channel) {
                return $channel
                    ->servers
                    ->filter(function($server) {
                        return $server->server_port > 0;
                    })
                    ->map(function($server) use ($channel) {
                        return [
                            'channel_id' => $channel->id, 
                            'channel_name' => $channel->name,
                            'server_id' => $server->id, 
                            'server_name' => $server->name,
                            'server_host' => $server->server_host, 
                            'server_port' => $server->server_port,
                        ];
                    });
            })
            ->flatten(1)
            ->toArray();

        ServerModel::upsert($attributes, 'channel_id,server_id');

        return ['code' => 0, 'msg' => ''];
    }
}
