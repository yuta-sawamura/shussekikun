<?php

namespace App\Providers;

use App\Enums\User\Role;
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

        // システム管理者のみ
        Gate::define('system-only', function ($user) {
            return ($user->role === Role::System);
        });
        // 組織管理者以上
        Gate::define('organization-admin-higher', function ($user) {
            return ($user->role > 0 && $user->role <= Role::Organization_admin);
        });
        // 組織管理者のみ
        Gate::define('organization-admin-only', function ($user) {
            return ($user->role === Role::Organization_admin);
        });
        // 共有アカウント以上
        Gate::define('share-higher', function ($user) {
            return ($user->role > 0 && $user->role <= Role::Store_share);
        });
        // 共有アカウント
        Gate::define('share', function ($user) {
            return ($user->role === Role::Store_share);
        });
        // 会員アカウント
        Gate::define('normal', function ($user) {
            return ($user->role === Role::Normal);
        });
    }
}
