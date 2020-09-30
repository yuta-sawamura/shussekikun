<?php

namespace App\Policies;

use App\User;
use App\Models\Classwork;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassworkPolicy
{
    use HandlesAuthorization;

    /**
     * 管理画面でユーザーは店舗を閲覧・操作できるか判定
     *
     * @param  App\User  $user
     * @param  App\Models\Classwork $classwork
     * @return bool
     */
    public function anyAdmin(User $user, Classwork $classwork): bool
    {
        return $user->organization_id === $classwork->organization_id;
    }
}
