<?php

namespace Database\Seeders;

use App\Admin\Models\Admin\UserPermissionModel;
use App\Admin\Models\Admin\RoleModel;
use App\Admin\Models\Admin\RolePermissionModel;
use App\Admin\Models\Admin\MenuModel;
use App\Admin\Models\Admin\RoleMenuModel;
use App\Admin\Models\Admin\PermissionModel;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {

        UserPermissionModel::truncate();
        UserPermissionModel::insert(
            [

            ]
        );

        RoleModel::truncate();
        RoleModel::insert(
            [
                [
                    "id" => 1,
                    "name" => "管理员",
                    "tag" => "Administrator"
                ],
                [
                    "id" => 2,
                    "name" => "服务端",
                    "tag" => "Backend"
                ],
                [
                    "id" => 3,
                    "name" => "客户端",
                    "tag" => "Frontend"
                ],
                [
                    "id" => 4,
                    "name" => "策划",
                    "tag" => "Product"
                ],
                [
                    "id" => 5,
                    "name" => "运营",
                    "tag" => "Operation"
                ]
            ]
        );

        RolePermissionModel::truncate();
        RolePermissionModel::insert(
            [
                [
                    "id" => 1,
                    "role_id" => 1,
                    "permission_id" => 1
                ],
                [
                    "id" => 2,
                    "role_id" => 2,
                    "permission_id" => 2
                ],
                [
                    "id" => 3,
                    "role_id" => 2,
                    "permission_id" => 3
                ],
                [
                    "id" => 4,
                    "role_id" => 2,
                    "permission_id" => 4
                ],
                [
                    "id" => 5,
                    "role_id" => 2,
                    "permission_id" => 6
                ],
                [
                    "id" => 6,
                    "role_id" => 2,
                    "permission_id" => 7
                ]
            ]
        );

        MenuModel::truncate();
        MenuModel::insert(
            [
                [
                    "id" => 1,
                    "parent_id" => 0,
                    "type" => 1,
                    "order" => 1,
                    "title" => "仪表盘",
                    "icon" => "fa fa-dashboard",
                    "url" => "/",
                    "permission" => ""
                ],
                [
                    "id" => 2,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 2,
                    "title" => "活跃统计",
                    "icon" => "fa fa-line-chart",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 3,
                    "parent_id" => 2,
                    "type" => 1,
                    "order" => 3,
                    "title" => "实时在线人数",
                    "icon" => "fa fa-area-chart",
                    "url" => "/active-statistic/user-online",
                    "permission" => ""
                ],
                [
                    "id" => 4,
                    "parent_id" => 2,
                    "type" => 1,
                    "order" => 4,
                    "title" => "注册统计",
                    "icon" => "fa fa-area-chart",
                    "url" => "/active-statistic/user-register",
                    "permission" => ""
                ],
                [
                    "id" => 5,
                    "parent_id" => 2,
                    "type" => 1,
                    "order" => 5,
                    "title" => "登录统计",
                    "icon" => "fa fa-area-chart",
                    "url" => "/active-statistic/user-login",
                    "permission" => ""
                ],
                [
                    "id" => 6,
                    "parent_id" => 2,
                    "type" => 1,
                    "order" => 6,
                    "title" => "存活统计",
                    "icon" => "fa fa-table",
                    "url" => "/active-statistic/user-survival",
                    "permission" => ""
                ],
                [
                    "id" => 7,
                    "parent_id" => 2,
                    "type" => 1,
                    "order" => 7,
                    "title" => "每日在线时长分布",
                    "icon" => "fa fa-pie-chart",
                    "url" => "/active-statistic/daily-online-time",
                    "permission" => ""
                ],
                [
                    "id" => 8,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 8,
                    "title" => "充值统计",
                    "icon" => "fa fa-line-chart",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 9,
                    "parent_id" => 8,
                    "type" => 1,
                    "order" => 9,
                    "title" => "LTV",
                    "icon" => "fa fa-table",
                    "url" => "/charge-statistic/ltv",
                    "permission" => ""
                ],
                [
                    "id" => 10,
                    "parent_id" => 8,
                    "type" => 1,
                    "order" => 10,
                    "title" => "ARP-U",
                    "icon" => "fa fa-table",
                    "url" => "/charge-statistic/arp-u",
                    "permission" => ""
                ],
                [
                    "id" => 11,
                    "parent_id" => 8,
                    "type" => 1,
                    "order" => 11,
                    "title" => "ARP-PU",
                    "icon" => "fa fa-table",
                    "url" => "/charge-statistic/arp-pu",
                    "permission" => ""
                ],
                [
                    "id" => 12,
                    "parent_id" => 8,
                    "type" => 1,
                    "order" => 12,
                    "title" => "充值率",
                    "icon" => "fa fa-table",
                    "url" => "/charge-statistic/charge-rate",
                    "permission" => ""
                ],
                [
                    "id" => 13,
                    "parent_id" => 8,
                    "type" => 1,
                    "order" => 13,
                    "title" => "每日充值统计",
                    "icon" => "fa fa-table",
                    "url" => "/charge-statistic/charge-daily",
                    "permission" => ""
                ],
                [
                    "id" => 14,
                    "parent_id" => 8,
                    "type" => 1,
                    "order" => 14,
                    "title" => "充值排行",
                    "icon" => "fa fa-table",
                    "url" => "/charge-statistic/charge-rank",
                    "permission" => ""
                ],
                [
                    "id" => 15,
                    "parent_id" => 8,
                    "type" => 1,
                    "order" => 15,
                    "title" => "充值区间分布",
                    "icon" => "fa fa-pie-chart",
                    "url" => "/charge-statistic/charge-distribution",
                    "permission" => ""
                ],
                [
                    "id" => 16,
                    "parent_id" => 8,
                    "type" => 1,
                    "order" => 16,
                    "title" => "首充时间分布",
                    "icon" => "fa fa-pie-chart",
                    "url" => "/charge-statistic/first-charge-time-distribution",
                    "permission" => ""
                ],
                [
                    "id" => 17,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 17,
                    "title" => "数据统计",
                    "icon" => "fa fa-line-chart",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 18,
                    "parent_id" => 17,
                    "type" => 1,
                    "order" => 18,
                    "title" => "等级统计",
                    "icon" => "fa fa-bar-chart",
                    "url" => "/statistic/level",
                    "permission" => ""
                ],
                [
                    "id" => 19,
                    "parent_id" => 17,
                    "type" => 1,
                    "order" => 19,
                    "title" => "资产产出分布",
                    "icon" => "fa fa-pie-chart",
                    "url" => "/statistic/asset-produce",
                    "permission" => ""
                ],
                [
                    "id" => 20,
                    "parent_id" => 17,
                    "type" => 1,
                    "order" => 20,
                    "title" => "资产消耗分布",
                    "icon" => "fa fa-pie-chart",
                    "url" => "/statistic/asset-consume",
                    "permission" => ""
                ],
                [
                    "id" => 21,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 21,
                    "title" => "游戏数据",
                    "icon" => "fa fa-save",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 22,
                    "parent_id" => 21,
                    "type" => 1,
                    "order" => 22,
                    "title" => "玩家数据",
                    "icon" => "fa fa-user-plus",
                    "url" => "/game-table/user",
                    "permission" => ""
                ],
                [
                    "id" => 23,
                    "parent_id" => 21,
                    "type" => 1,
                    "order" => 23,
                    "title" => "配置数据",
                    "icon" => "fa fa-tags",
                    "url" => "/game-table/configure",
                    "permission" => ""
                ],
                [
                    "id" => 24,
                    "parent_id" => 21,
                    "type" => 1,
                    "order" => 24,
                    "title" => "日志数据",
                    "icon" => "fa fa-history",
                    "url" => "/game-table/log",
                    "permission" => ""
                ],
                [
                    "id" => 25,
                    "parent_id" => 21,
                    "type" => 1,
                    "order" => 25,
                    "title" => "客户端错误日志",
                    "icon" => "fa fa-warning",
                    "url" => "/game-admin/client-error-log",
                    "permission" => ""
                ],
                [
                    "id" => 26,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 26,
                    "title" => "配置管理",
                    "icon" => "fa fa-database",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 27,
                    "parent_id" => 26,
                    "type" => 1,
                    "order" => 27,
                    "title" => "配置表",
                    "icon" => "fa fa-list-ol",
                    "url" => "/configure-table",
                    "permission" => ""
                ],
                [
                    "id" => 28,
                    "parent_id" => 26,
                    "type" => 1,
                    "order" => 28,
                    "title" => "服务器配置(erl)",
                    "icon" => "fa fa-server",
                    "url" => "/configure-file/erl",
                    "permission" => ""
                ],
                [
                    "id" => 29,
                    "parent_id" => 26,
                    "type" => 1,
                    "order" => 29,
                    "title" => "客户端配置(lua)",
                    "icon" => "fa fa-desktop",
                    "url" => "/configure-file/lua",
                    "permission" => ""
                ],
                [
                    "id" => 30,
                    "parent_id" => 26,
                    "type" => 1,
                    "order" => 30,
                    "title" => "客户端配置(js)",
                    "icon" => "fa fa-tv",
                    "url" => "/configure-file/js",
                    "permission" => ""
                ],
                [
                    "id" => 31,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 31,
                    "title" => "服务器管理",
                    "icon" => "fa fa-gears",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 32,
                    "parent_id" => 31,
                    "type" => 1,
                    "order" => 32,
                    "title" => "渠道列表",
                    "icon" => "fa fa-list-ul",
                    "url" => "/server-manage/channel-list",
                    "permission" => ""
                ],
                [
                    "id" => 33,
                    "parent_id" => 31,
                    "type" => 1,
                    "order" => 33,
                    "title" => "服务器列表",
                    "icon" => "fa fa-list-ul",
                    "url" => "/server-manage/server-list",
                    "permission" => ""
                ],
                [
                    "id" => 34,
                    "parent_id" => 31,
                    "type" => 1,
                    "order" => 34,
                    "title" => "服务器调整",
                    "icon" => "fa fa-cog",
                    "url" => "/server-manage/server-tuning/index",
                    "permission" => ""
                ],
                [
                    "id" => 35,
                    "parent_id" => 31,
                    "type" => 1,
                    "order" => 35,
                    "title" => "开服",
                    "icon" => "fa fa-clone",
                    "url" => "/server-manage/open",
                    "permission" => ""
                ],
                [
                    "id" => 36,
                    "parent_id" => 31,
                    "type" => 1,
                    "order" => 36,
                    "title" => "合服",
                    "icon" => "fa fa-copy",
                    "url" => "/server-manage/merge",
                    "permission" => ""
                ],
                [
                    "id" => 37,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 37,
                    "title" => "运营管理",
                    "icon" => "fa fa-user-plus",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 38,
                    "parent_id" => 37,
                    "type" => 1,
                    "order" => 38,
                    "title" => "玩家管理",
                    "icon" => "fa fa-sliders",
                    "url" => "/operation/user-manage",
                    "permission" => ""
                ],
                [
                    "id" => 39,
                    "parent_id" => 37,
                    "type" => 1,
                    "order" => 39,
                    "title" => "玩家聊天管理",
                    "icon" => "fa fa-magic",
                    "url" => "/operation/user-chat-manage",
                    "permission" => ""
                ],
                [
                    "id" => 40,
                    "parent_id" => 37,
                    "type" => 1,
                    "order" => 40,
                    "title" => "邮件",
                    "icon" => "fa fa-envelope-o",
                    "url" => "/operation/mail",
                    "permission" => ""
                ],
                [
                    "id" => 41,
                    "parent_id" => 37,
                    "type" => 1,
                    "order" => 41,
                    "title" => "公告",
                    "icon" => "fa fa-edit",
                    "url" => "/operation/notice",
                    "permission" => ""
                ],
                [
                    "id" => 42,
                    "parent_id" => 37,
                    "type" => 1,
                    "order" => 42,
                    "title" => "维护公告",
                    "icon" => "fa fa-bullhorn",
                    "url" => "/operation/maintain-notice",
                    "permission" => ""
                ],
                [
                    "id" => 43,
                    "parent_id" => 37,
                    "type" => 1,
                    "order" => 43,
                    "title" => "举报信息",
                    "icon" => "fa fa-info-circle",
                    "url" => "/operation/impeach",
                    "permission" => ""
                ],
                [
                    "id" => 44,
                    "parent_id" => 37,
                    "type" => 1,
                    "order" => 44,
                    "title" => "敏感词",
                    "icon" => "fa fa-filter",
                    "url" => "/operation/sensitive-word-data",
                    "permission" => ""
                ],
                [
                    "id" => 45,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 45,
                    "title" => "工具",
                    "icon" => "fa fa-wrench",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 46,
                    "parent_id" => 45,
                    "type" => 1,
                    "order" => 46,
                    "title" => "SSH Key生成",
                    "icon" => "fa fa-key",
                    "url" => "/assistant/key-assistant",
                    "permission" => ""
                ],
                [
                    "id" => 47,
                    "parent_id" => 45,
                    "type" => 1,
                    "order" => 47,
                    "title" => "构造器测试",
                    "icon" => "fa fa-key",
                    "url" => "/assistant/builder-test",
                    "permission" => ""
                ],
                [
                    "id" => 48,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 48,
                    "title" => "管理员",
                    "icon" => "fa fa-tasks",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 49,
                    "parent_id" => 48,
                    "type" => 1,
                    "order" => 49,
                    "title" => "用户",
                    "icon" => "fa fa-users",
                    "url" => "/admin/user",
                    "permission" => ""
                ],
                [
                    "id" => 50,
                    "parent_id" => 48,
                    "type" => 1,
                    "order" => 50,
                    "title" => "角色",
                    "icon" => "fa fa-user",
                    "url" => "/admin/role",
                    "permission" => ""
                ],
                [
                    "id" => 51,
                    "parent_id" => 48,
                    "type" => 1,
                    "order" => 51,
                    "title" => "权限",
                    "icon" => "fa fa-ban",
                    "url" => "/admin/permission",
                    "permission" => ""
                ],
                [
                    "id" => 52,
                    "parent_id" => 48,
                    "type" => 1,
                    "order" => 52,
                    "title" => "菜单",
                    "icon" => "fa fa-bars",
                    "url" => "/admin/menu",
                    "permission" => ""
                ],
                [
                    "id" => 53,
                    "parent_id" => 48,
                    "type" => 1,
                    "order" => 53,
                    "title" => "操作日志",
                    "icon" => "fa fa-history",
                    "url" => "/admin/log",
                    "permission" => ""
                ]
            ]
        );

        RoleMenuModel::truncate();
        RoleMenuModel::insert(
            [

            ]
        );

        PermissionModel::truncate();
        PermissionModel::insert(
            [
                [
                    "id" => 1,
                    "name" => "全部",
                    "tag" => "All",
                    "http_method" => "",
                    "http_path" => "*"
                ],
                [
                    "id" => 2,
                    "name" => "仪表盘",
                    "tag" => "Dashboard",
                    "http_method" => "GET",
                    "http_path" => "/\r\n/channel/*\r\n/server/*\r\n/config/*"
                ],
                [
                    "id" => 3,
                    "name" => "登录",
                    "tag" => "Login",
                    "http_method" => "",
                    "http_path" => "/auth/login\r\n/auth/logout"
                ],
                [
                    "id" => 4,
                    "name" => "用户设置",
                    "tag" => "Setting",
                    "http_method" => "GET,PUT",
                    "http_path" => "/auth/profile\r\n/auth/setting"
                ],
                [
                    "id" => 5,
                    "name" => "管理员",
                    "tag" => "Administrator",
                    "http_method" => "",
                    "http_path" => "/admin/user\r\n/admin/roles\r\n/admin/permissions\r\n/admin/menu\r\n/admin/log"
                ],
                [
                    "id" => 6,
                    "name" => "统计",
                    "tag" => "Statistic",
                    "http_method" => "",
                    "http_path" => "/active-statistic/*\r\n/charge-statistic/*\r\n/statistic/*"
                ],
                [
                    "id" => 7,
                    "name" => "数据",
                    "tag" => "Data",
                    "http_method" => "",
                    "http_path" => "/game-table/*\r\n/game-data/*"
                ],
                [
                    "id" => 8,
                    "name" => "运营",
                    "tag" => "Operation",
                    "http_method" => "",
                    "http_path" => "/operation/*"
                ]
            ]
        );
    }
}
