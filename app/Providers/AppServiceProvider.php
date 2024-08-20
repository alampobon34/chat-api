<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\ChatHistoryRepository;
use App\Repositories\ChatRoomRepository;
use App\Services\AuthService;
use App\Services\ChatHistoryService;
use App\Services\ChatRoomService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ChatRoomRepository::class, ChatRoomService::class);
        $this->app->bind(ChatHistoryRepository::class, ChatHistoryService::class);
        $this->app->bind(AuthRepository::class, AuthService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
