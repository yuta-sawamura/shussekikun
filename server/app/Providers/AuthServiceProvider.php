<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // システム管理者
        Gate::define('system-only', function ($user) {
            return ($user->role === 1);
        });
        // 組織管理者以上
        Gate::define('admin-higher', function ($user) {
            return ($user->role > 0 && $user->role <= 3);
        });
        // 共有アカウント以上
        Gate::define('share-higher', function ($user) {
            return ($user->role > 0 && $user->role <= 5);
        });
    }
}
