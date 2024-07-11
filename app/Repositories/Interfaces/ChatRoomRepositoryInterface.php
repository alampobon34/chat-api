<?php

namespace App\Repositories\Interfaces;

interface ChatRoomRepositoryInterface
{
    public function index();

    public function store(array $data);
}
