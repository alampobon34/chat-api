<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $auth_service;

    public function __construct(AuthService $authService)
    {
        $this->auth_service = $authService;
    }
    public function loginUser(LoginRequest $request)
    {
        return $this->auth_service->signIn($request->all());
    }
}
