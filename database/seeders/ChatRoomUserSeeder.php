<?php

namespace Database\Seeders;

use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatRoomUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chatRooms = ChatRoom::all();
        $users = User::all();

        // Attach users to chat rooms
        foreach ($chatRooms as $chatRoom) {
            $chatRoom->users()->attach(
                $users->random(rand(1, 5))->pluck('id')->toArray()
            );
        }
    }
}
