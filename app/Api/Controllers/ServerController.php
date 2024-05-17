<?php

namespace App\Api\Controllers;

use App\Api\Models\ServerModel;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    /**
     * @OA\Get(
     *     path = "/api/server",
     *     summary = "获取服务器",
     *     @OA\Response(
     *         response = 200,
     *         description = "OK",
     *         @OA\JsonContent(
     *             @OA\Examples(example = "result", value = {"server_id": 1, "server_name": "服务器名", "server_host": "127.0.0.1", "server_port": 8974}, summary = "服务器"),
     *         )
     *     )
     * )
     */
    public function get(Request $request)
    {
        $headers = [
            "Access-Control-Allow-Origin" => "*",
            "Access-Control-Max-Age" => "86400",
            "Access-Control-Allow-Headers" => "Content-Type, Accept, Authorization, X-Requested-With"
        ];
        
        foreach($headers as $key => $value) {
            header("$key: $value");
        }
 
        $channel = $request->input('channel', '');

        $model = new ServerModel();
        return $model
            ->where('channel_id', $channel)
            ->orderBy('number')
            ->limit(1)
            ->first([
                'server_id', 
                'server_name', 
                'server_host', 
                'server_port', 
                'number'
            ]);
    }

    /**
     * @OA\Get(
     *     path = "/api/server-list",
     *     summary = "获取服务器列表",
     *     @OA\Parameter(
     *         description = "渠道",
     *         in = "query",
     *         name = "channel",
     *         required = true,
     *         @OA\Schema(type = "string"),
     *         @OA\Examples(example = "channel", value = "mini-app", summary = "渠道."),
     *     ),
     *     @OA\Response(
     *         response = 200,
     *         description = "OK",
     *         @OA\JsonContent(
     *             @OA\Examples(example = "result", value = {{"server_id": 1, "server_name": "服务器名", "server_host": "127.0.0.1", "server_port": 8974}}, summary = "服务器列表"),
     *         )
     *     )
     * )
     */
    public function list(Request $request)
    {
        $channel = $request->input('channel', '');

        $per = $request->input('per', 10);
        
        $page = $request->input('page', 0);

        $model = new ServerModel();
        $data = $model
            ->where('channel_id', $channel)
            ->simplePaginate($per, [
                'server_id', 
                'server_name', 
                'server_host', 
                'server_port', 
                'number'
            ], 'page', $page)
            ->items();

        $headers = [
            "Access-Control-Allow-Origin" => "*",
            "Access-Control-Max-Age" => "86400",
            "Access-Control-Allow-Headers" => "Content-Type, Accept, Authorization, X-Requested-With"
        ];
        
        foreach($headers as $key => $value) {
            header("$key: $value");
        }

        return $data;
    }
}
