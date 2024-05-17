<?php

namespace App\Admin\Controllers\Extend;

use App\Admin\Controllers\Controller;
use App\Admin\Services\Extend\ChannelService;
use App\Admin\Services\Extend\ServerService;

class IndexController extends Controller
{
    public function index()
    {
        $channels = ChannelService::getChannels();

        $channel = ChannelService::getChannel();

        $server = ServerService::getServer();

        return admin_view('index', ['channels' => $channels, 'channel' => $channel, 'server' => $server]);
    }
}
