<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\User\Agent as Agent;
use App\Http\ViewComposers\User\FriendRecommendComposer;
use App\Http\ViewComposers\User\Worker as Worker;
use View;
use App\Http\View\Composers as V;

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
        View::composers([
            V\UserComposer::class => 'admin/user/*',
            V\StoreComposer::class => ['admin/user/*', 'admin/classwork/*', 'admin/schedule/*', 'admin/news/*'],
            V\ClassworkComposer::class => 'admin/schedule/*',
            V\DayComposer::class => 'admin/schedule/*',
        ]);
    }
}
