<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChatRoom;
use App\Services\Interfaces\ChatRoomServiceInterface;
use Illuminate\Http\Request;
use App\Http\Requests\ChatRoomRequest;
use Exception;

class ChatRoomController extends Controller
{
    protected $chatRoomService;

    public function __construct(ChatRoomServiceInterface $chatRoomService)
    {
        $this->chatRoomService = $chatRoomService;
    }

    public function index()
    {
        $rooms = $this->chatRoomService->index();
        return $this->commonApiResponse(200, 'Data Fetch Successfully', $rooms);
    }

    public function store(ChatRoomRequest $request)
    {
        try {
            return $this->commonApiResponse(200, 'Chat Room Created Successfully', $request->all());
        } catch (Exception $e) {
            return $this->commonErrorResponse(500, 'Something Went Wrong', $e->getMessage());
        }
    }
}
