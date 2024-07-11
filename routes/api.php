<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChatRoomController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/chat-room')->group(function () {
    Route::get('', [ChatRoomController::class, 'index']);
    Route::post('', [ChatRoomController::class, 'store']);
});
