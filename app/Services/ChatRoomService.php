<?php

namespace App\Services;

use App\Repositories\Interfaces\ChatRoomRepositoryInterface;
use App\Services\Interfaces\ChatRoomServiceInterface;
use Throwable;

class ChatRoomService implements ChatRoomServiceInterface
{
    protected $chatRoomRepository;

    public function __construct(ChatRoomRepositoryInterface $chatRoomRepository)
    {
        $this->chatRoomRepository = $chatRoomRepository;
    }

    public function index()
    {
        return $this->chatRoomRepository->index();
    }

    public function store(array $data)
    {
        try {
            return $this->chatRoomRepository->store($data);
        } catch (Throwable $e) {
            return $e;
        }
    }
}
