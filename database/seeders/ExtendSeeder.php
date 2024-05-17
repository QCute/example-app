<?php

namespace Database\Seeders;

use App\Admin\Models\Extend\ChannelModel;
use App\Admin\Models\Extend\RoleChannelModel;
use App\Admin\Models\Extend\ChannelServerModel;
use App\Admin\Models\Extend\ServerModel;
use App\Admin\Models\Extend\RoleServerModel;
use App\Admin\Models\GameConfigure\ConfigureFileModel;
use App\Admin\Models\GameConfigure\ConfigureTableModel;
use App\Admin\Models\Assistant\SSHKeyModel;
use Illuminate\Database\Seeder;

class ExtendSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        ChannelModel::truncate();
        ChannelModel::insert(
            [
                [
                    "id" => 1,
                    "name" => "全渠道",
                    "company" => "全渠道",
                    "tag" => "ALL",
                    "permission" => ""
                ],
                [
                    "id" => 2,
                    "name" => "微信小程序",
                    "company" => "Tencent",
                    "tag" => "",
                    "permission" => ""
                ],
                [
                    "id" => 3,
                    "name" => "抖音小程序",
                    "company" => "ByteDance",
                    "tag" => "",
                    "permission" => ""
                ],
                [
                    "id" => 4,
                    "name" => "快手小程序",
                    "company" => "KwAi",
                    "tag" => "",
                    "permission" => ""
                ]
            ]
        );

        RoleChannelModel::truncate();
        RoleChannelModel::insert(
            [

            ]
        );

        ChannelServerModel::truncate();
        ChannelServerModel::insert(
            [
                [
                    "id" => 1,
                    "channel_id" => 1,
                    "server_id" => 1
                ],
                [
                    "id" => 2,
                    "channel_id" => 1,
                    "server_id" => 2
                ],
                [
                    "id" => 3,
                    "channel_id" => 1,
                    "server_id" => 3
                ]
            ]
        );

        ServerModel::truncate();
        ServerModel::insert(
            [
                [
                    "id" => 1,
                    "name" => "全服",
                    "tag" => "ALL",
                    "node" => "",
                    "ssh_host" => "",
                    "ssh_pass" => "",
                    "server_root" => "",
                    "configure_root" => "",
                    "protocol_root" => "",
                    "server_host" => "",
                    "server_port" => 0,
                    "db_host" => "",
                    "db_port" => "",
                    "db_name" => "",
                    "db_username" => "",
                    "db_password" => "",
                    "type" => "",
                    "cookie" => "",
                    "open_time" => 0,
                    "tab_name" => "",
                    "center" => "",
                    "world" => "",
                    "state" => "",
                    "recommend" => "",
                    "permission" => ""
                ],
                [
                    "id" => 2,
                    "name" => "本地",
                    "tag" => "",
                    "node" => "local",
                    "ssh_host" => "",
                    "ssh_pass" => "",
                    "server_root" => "/data/moco/server",
                    "configure_root" => "/data/moco/server",
                    "protocol_root" => "/data/moco/server",
                    "server_host" => "192.168.30.155",
                    "server_port" => 11001,
                    "db_host" => "192.168.30.155",
                    "db_port" => "3306",
                    "db_name" => "local",
                    "db_username" => "root",
                    "db_password" => "root",
                    "type" => "local",
                    "cookie" => "erlang",
                    "open_time" => 1699804800,
                    "tab_name" => "",
                    "center" => "",
                    "world" => "",
                    "state" => "",
                    "recommend" => "new",
                    "permission" => ""
                ],
                [
                    "id" => 3,
                    "name" => "本地1",
                    "tag" => "",
                    "node" => "dev",
                    "ssh_host" => "",
                    "ssh_pass" => "",
                    "server_root" => "/data/moco/server",
                    "configure_root" => "/data/moco/server",
                    "protocol_root" => "/data/moco/server",
                    "server_host" => "192.168.30.155",
                    "server_port" => 11001,
                    "db_host" => "192.168.30.155",
                    "db_port" => "3306",
                    "db_name" => "local",
                    "db_username" => "root",
                    "db_password" => "root",
                    "type" => "local",
                    "cookie" => "erlang",
                    "open_time" => 1699804800,
                    "tab_name" => "",
                    "center" => "",
                    "world" => "",
                    "state" => "",
                    "recommend" => "new",
                    "permission" => ""
                ],
                [
                    "id" => 4,
                    "name" => "本地2",
                    "tag" => "",
                    "node" => "stable",
                    "ssh_host" => "",
                    "ssh_pass" => "",
                    "server_root" => "/data/moco/server",
                    "configure_root" => "/data/moco/server",
                    "protocol_root" => "/data/moco/server",
                    "server_host" => "192.168.30.155",
                    "server_port" => 11001,
                    "db_host" => "192.168.30.155",
                    "db_port" => "3306",
                    "db_name" => "local",
                    "db_username" => "root",
                    "db_password" => "root",
                    "type" => "local",
                    "cookie" => "erlang",
                    "open_time" => 1699804800,
                    "tab_name" => "",
                    "center" => "",
                    "world" => "",
                    "state" => "",
                    "recommend" => "new",
                    "permission" => ""
                ]
            ]
        );

        RoleServerModel::truncate();
        RoleServerModel::insert(
            [

            ]
        );

        ConfigureFileModel::truncate();
        ConfigureFileModel::insert(
            [

            ]
        );

        ConfigureTableModel::truncate();
        ConfigureTableModel::insert(
            [

            ]
        );

        SSHKeyModel::truncate();
        SSHKeyModel::insert(
            [

            ]
        );
    }
}
