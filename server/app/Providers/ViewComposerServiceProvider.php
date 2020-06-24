<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\User\Agent as Agent;
use App\Http\ViewComposers\User\FriendRecommendComposer;
use App\Http\ViewComposers\User\Worker as Worker;
use View;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'admin/user/*', 'App\Http\View\Composers\UserComposer'
        );
    }
}
