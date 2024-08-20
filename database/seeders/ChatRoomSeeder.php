<?php

namespace Database\Seeders;

use App\Models\ChatRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chatRooms = [
            ['room_name' => 'Single Chat Room', 'user_ids' => '1,2'],
            ['room_name' => 'Group Chat Room', 'user_ids' => '1,2,3'],
            ['room_name' => 'Other Chat Room', 'user_ids' => '11,22,111,222,1122'],
        ];
        ChatRoom::insert($chatRooms);
    }
}
