<?php

namespace App\Providers;

use App\Repositories\ChatRoomRepository;
use App\Repositories\Interfaces\ChatRoomRepositoryInterface;
use App\Services\ChatRoomService;
use App\Services\Interfaces\ChatRoomServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ChatRoomRepositoryInterface::class, ChatRoomRepository::class);
        $this->app->bind(ChatRoomServiceInterface::class, ChatRoomService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
