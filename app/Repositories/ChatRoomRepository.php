<?php

namespace App\Repositories;

use App\Models\ChatRoom;
use Illuminate\Support\Facades\DB;

class ChatRoomRepository
{
    public function index()
    {
        return ChatRoom::select(['id', 'room_name as roomName', 'user_ids as userIds', 'is_active'])->orderBy('id', 'DESC')->get();
    }


    public function getByUserId($user_id)
    {
        $results = DB::table('chat_rooms')
            ->where('user_ids', '=', $user_id)
            ->orWhere('user_ids', 'LIKE', $user_id . ',%')
            ->orWhere('user_ids', 'LIKE', '%,' . $user_id . ',%')
            ->orWhere('user_ids', 'LIKE', '%,' . $user_id)
            ->get(['id', 'room_name as roomName']);

        return $results;
    }


    public function store(array $data)
    {
        $room = new ChatRoom;
        $room->room_name = $data['roomName'];
        $room->user_ids = $data['userIds'];
        return $room->save();
    }
}
