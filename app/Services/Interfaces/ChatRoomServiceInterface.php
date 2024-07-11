<?php

namespace App\Services\Interfaces;

interface ChatRoomServiceInterface
{
    public function index();

    public function store(array $data);
}
