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
            ['room_name' => 'Chat Room 1'],
            ['room_name' => 'Chat Room 2'],
            ['room_name' => 'Chat Room 3'],
            ['room_name' => 'Chat Room 4'],
            ['room_name' => 'Chat Room 5'],
            ['room_name' => 'Chat Room 6'],
            ['room_name' => 'Chat Room 7'],
            ['room_name' => 'Chat Room 8'],
            ['room_name' => 'Chat Room 9'],
            ['room_name' => 'Chat Room 10'],
        ];
        ChatRoom::insert($chatRooms);
    }
}
