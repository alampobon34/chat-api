<?php

namespace App\Repositories;

use App\Models\ChatRoom;
use App\Repositories\Interfaces\ChatRoomRepositoryInterface;

class ChatRoomRepository implements ChatRoomRepositoryInterface
{
    public function index()
    {
        return ChatRoom::select(['id', 'room_name', 'is_active'])->orderBy('id', 'DESC')->get();
    }

    public function store(array $data)
    {
        return ChatRoom::create($data);
    }
}
