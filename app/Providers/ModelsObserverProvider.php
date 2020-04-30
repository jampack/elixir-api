<?php

namespace App\Providers;

use App\Models\Project;
use App\Models\User;
use App\Observers\ProjectObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class ModelsObserverProvider extends ServiceProvider
{
    /**
     * Register Services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap Services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Project::observe(ProjectObserver::class);
    }
}
