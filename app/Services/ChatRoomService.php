<?php

namespace App\Services;

use App\Helpers\ApiResponseHelper;
use App\Repositories\ChatRoomRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Throwable;

class ChatRoomService
{
    protected $chatRoomRepository;

    public function __construct(ChatRoomRepository $chatRoomRepository)
    {
        $this->chatRoomRepository = $chatRoomRepository;
    }

    public function index()
    {
        return $this->chatRoomRepository->index();
    }


    public function getByUserId($user_id)
    {
        try {
            $roomList = $this->chatRoomRepository->getByUserId($user_id);
            if ($roomList) {
                return ApiResponseHelper::successResponse(200, 'Chat History fetch successfully', $roomList);
            }
            return ApiResponseHelper::successResponse(200, 'No Chat History found', []);
        } catch (Exception $e) {
            return ApiResponseHelper::errorResponse(500, 'Internal Server Error', $e->getMessage());
        }
    }



    public function store(array $data)
    {
        try {
            $room = $this->chatRoomRepository->store($data);
            if ($room) {
                return ApiResponseHelper::successResponse(200, 'Chat room is created', $room);
            }
            return ApiResponseHelper::successResponse(200, 'Chat room is not created', null);
        } catch (Throwable $e) {
            return $e;
        }
    }
}
