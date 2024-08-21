<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChatRoomRequest;
use App\Models\User;
use App\Services\ChatRoomService;
use Exception;

class ChatRoomController extends Controller
{
    protected $chatRoomService;

    public function __construct(ChatRoomService $chatRoomService)
    {
        $this->chatRoomService = $chatRoomService;
    }

    public function index()
    {
        return $this->chatRoomService->index();
    }

    public function getByUserId(Request $request)
    {
        return  $this->chatRoomService->getByUserId($request->user()->id);
    }

    public function store(ChatRoomRequest $request)
    {
        return $this->chatRoomService->store($request->all());
    }
}
