<?php

use App\Http\Controllers\Api\AuthController as AuthenticationController;
use App\Http\Controllers\Api\ChatHistoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChatRoomController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::prefix('/auth')->group(function () {
    Route::post('/login', [AuthenticationController::class, 'loginUser']);
});


Route::middleware(['auth:sanctum'])->group(function () {

    Route::prefix('/chat-room')->group(function () {
        Route::get('', [ChatRoomController::class, 'index']);
        Route::get('/get-by-user', [ChatRoomController::class, 'getByUserId']);
        Route::post('/create', [ChatRoomController::class, 'store']);
    });

    Route::middleware(['valid-room-user'])->prefix('/chat-history')->group(function () {
        Route::post('/create', [ChatHistoryController::class, 'storeChatHisory']);
        Route::get('/get-by-room-id/{chatRoomId}', [ChatHistoryController::class, 'getListByChatRoomId']);
    });
});
