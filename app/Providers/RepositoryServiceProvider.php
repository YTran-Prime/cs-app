<?php

namespace App\Providers;

use App\Customer\Conversation\Repositories\ConversationRepository;
use App\Customer\Conversation\Repositories\Interfaces\ConversationRepositoryInterface;
use App\Customer\Dashboard\Repositories\DashboardRepository;
use App\Customer\Dashboard\Repositories\Interfaces\DashboardRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            ConversationRepositoryInterface::class,
            ConversationRepository::class
        );
        $this->app->bind(
            DashboardRepositoryInterface::class,
            DashboardRepository::class
        );
    }
}
