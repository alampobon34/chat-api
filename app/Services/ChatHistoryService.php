<?php

namespace App\Services;

use App\Helpers\ApiResponseHelper;
use App\Repositories\ChatHistoryRepository;
use Exception;

class ChatHistoryService
{
    protected $chat_history_repository;


    public function __construct(ChatHistoryRepository $chat_history_repository)
    {
        $this->chat_history_repository = $chat_history_repository;
    }

    public function storeChat(array $array)
    {
        try {
            $history = $this->chat_history_repository->store($array);
            if ($history) {
                return ApiResponseHelper::successResponse(200, 'Chat History saved successfully', $history);
            }
            return ApiResponseHelper::successResponse(200, 'Chat History not created', null);
        } catch (Exception $e) {
            return ApiResponseHelper::errorResponse(500, 'Internal Server Error', $e->getMessage());
        }
    }


    public function getHistoryListByChatRoomId($chat_room_id)
    {
        try {
            $historyList = $this->chat_history_repository->getListByChatRoomId($chat_room_id);
            if ($historyList) {
                return ApiResponseHelper::successResponse(200, 'Chat History fetch successfully', $historyList);
            }
            return ApiResponseHelper::successResponse(200, 'No Chat History found', []);
        } catch (Exception $e) {
            return ApiResponseHelper::errorResponse(500, 'Internal Server Error', $e->getMessage());
        }
    }
}
