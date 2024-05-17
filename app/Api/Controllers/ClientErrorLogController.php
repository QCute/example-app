<?php

namespace App\Api\Controllers;

use App\Api\Models\ClientErrorLogModel;
use Illuminate\Http\Request;

class ClientErrorLogController extends Controller
{
    /**
     * @OA\Post(
     *     path = "/api/client-error-log",
     *     summary = "客户端错误日志上报",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property = "server_id",
     *                     type = "integer",
     *                     description = "服务器ID",
     *                 ),
     *                 @OA\Property(
     *                     property = "account",
     *                     type = "string",
     *                     description = "账户名",
     *                 ),
     *                 @OA\Property(
     *                     property = "role_id",
     *                     type = "integer",
     *                     description = "角色ID",
     *                 ),
     *                 @OA\Property(
     *                     property = "role_name",
     *                     type = "string",
     *                     description = "角色名",
     *                 ),
     *                 @OA\Property(
     *                     property = "device",
     *                     type = "string",
     *                     description = "设备",
     *                 ),
     *                 @OA\Property(
     *                     property = "env",
     *                     type = "string",
     *                     description = "环境",
     *                 ),
     *                 @OA\Property(
     *                     property = "title",
     *                     type = "string",
     *                     description = "标题",
     *                 ),
     *                 @OA\Property(
     *                     property = "content",
     *                     type = "string",
     *                     description = "内容",
     *                 ),
     *                 @OA\Property(
     *                     property = "content_kernel",
     *                     type = "string",
     *                     description = "内容核心",
     *                 ),
     *             ),
     *             @OA\Examples(example = "result", value = { "server_id": 1, "account": "account_name", "role_id": 1, "role_name": "nickname", "device": "android", "env": "release", "title": "", "content": "", "content_kernel": ""}, summary = "错误信息"),
     *         )
     *     ),
     *     @OA\Response(
     *         response = 200,
     *         description = "OK",
     *         @OA\JsonContent(
     *             @OA\Examples(example = "result", value = {"result": "ok"}, summary = "结果"),
     *         )
     *     )
     * )
     */
    public function report(Request $request)
    {
        // post must be carriage csrf field or remove VerifyCsrfToken
        $server_id = $request->json('server_id', 0);
        $account = $request->json('account', '');
        $role_id = $request->json('role_id', 0);
        $role_name = $request->json('role_name', '');
        $device = $request->json('device', '');
        $env = $request->json('env', '');
        $title = $request->json('title', '');
        $content = $request->json('content', '');
        $content_kernel = $request->json('content_kernel', '');
        $ip = $request->ip();

        // save
        $data = [
            'server_id' => $server_id, 
            'account' => $account, 
            'role_id' => $role_id, 
            'role_name' => $role_name, 
            'device' => $device, 
            'env' => $env, 
            'title' => $title, 
            'content' => $content, 
            'content_kernel' => $content_kernel, 
            'ip' => $ip, 
        ];
        $model = new ClientErrorLogModel();
        $model->insert($data);

        return ['result' => 'ok'];
    }
}
