<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatHistoryRequest;
use App\Services\ChatHistoryService;
use Illuminate\Http\Request;

class ChatHistoryController extends Controller
{
    protected $chat_history_service;


    public function __construct(ChatHistoryService $chat_history_service)
    {
        $this->chat_history_service = $chat_history_service;
    }

    public function storeChatHisory(ChatHistoryRequest $request)
    {
        return $this->chat_history_service->storeChat($request->all());
    }

    public function getListByChatRoomId($id)
    {
        return $this->chat_history_service->getHistoryListByChatRoomId($id);
    }
}
