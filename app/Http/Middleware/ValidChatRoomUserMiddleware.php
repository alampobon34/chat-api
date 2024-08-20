<?php

namespace App\Http\Middleware;

use App\Helpers\ApiResponseHelper;
use App\Models\ChatRoom;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidChatRoomUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $chat_room_id = $request->chatRoomId;
        if (!$user) {
            return ApiResponseHelper::errorResponse(403, "You don't have permission in this chat room", 'Unauthorized');
        }
        if (!$chat_room_id) {
            return ApiResponseHelper::errorResponse(403, "You don't have permission in this chat room", 'Chat room id is missing.');
        }
        $room = ChatRoom::where('id', $chat_room_id)->first(['user_ids']);
        if (!$room) {
            return ApiResponseHelper::errorResponse(403, "You don't have permission in this chat room", 'Invalid room id.');
        }
        $idList = explode(',', $room->user_ids);
        if (in_array($user->id, $idList) === false) {
            return ApiResponseHelper::errorResponse(403, "You don't have permission in this chat room", 'You are not the member in this room.');
        }
        return $next($request);
    }
}
