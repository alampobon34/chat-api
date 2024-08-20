<?php

namespace App\Repositories;

use App\Models\ChatHistory;

class ChatHistoryRepository
{

    public function store(array $data)
    {
        $history = new ChatHistory;
        $history->chat_room_id = $data['chatRoomId'];
        $history->title = $data['title'];
        $history->body = $data['body'];
        $history->save();
        return $history;
    }

    public function getListByChatRoomId($chat_room_id)
    {
        return ChatHistory::where('chat_room_id', $chat_room_id)->orderBy('id', 'ASC')->get(['id', 'chat_room_id as chatRoomId', 'title', 'body', 'is_read as isRead']);
    }
}
