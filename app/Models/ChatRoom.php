<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;

    protected $table = 'chat_rooms';

    protected $fillable = [
        'room_name',
        'user_ids',
        'is_active',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
