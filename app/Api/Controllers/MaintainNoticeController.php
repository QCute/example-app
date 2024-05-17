<?php

namespace App\Api\Controllers;

use App\Api\Models\MaintainNoticeModel;
use Illuminate\Http\Request;

class MaintainNoticeController extends Controller
{
    /**
     * @OA\Get(
     *     path = "/api/maintain-notice",
     *     summary = "维护公告",
     *     @OA\Parameter(
     *         description = "渠道",
     *         in = "query",
     *         name = "channel",
     *         required = true,
     *         @OA\Schema(type = "string"),
     *         @OA\Examples(example = "channel", value = "deal", summary = "渠道"),
     *     ),
     *     @OA\Response(
     *         response = 200,
     *         description = "OK",
     *         @OA\JsonContent(
     *             @OA\Examples(example = "result", value = {"title": "this is title", "content": "this is content", "start_time": 1649308407, "end_time": 1649394797}, summary = "维护公告"),
     *         )
     *     )
     * )
     */
    public function get(Request $request)
    {
        $channel = $request->input('channel', '');
        $data = MaintainNoticeModel::getNotices($channel);

        return $data;
    }
}
