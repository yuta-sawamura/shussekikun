<?php

namespace App\Policies;

use App\User;
use App\Models\Store;
use Illuminate\Auth\Access\HandlesAuthorization;

class StorePolicy
{
    use HandlesAuthorization;

    /**
     * 管理画面でユーザーは店舗を閲覧・操作できるか判定
     *
     * @param  App\User  $user
     * @param  App\Models\Store $store
     * @return bool
     */
    public function anyAdmin(User $user, Store $store): bool
    {
        return $user->organization_id === $store->organization_id;
    }
}
