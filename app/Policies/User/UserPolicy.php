<?php

namespace App\Policies\User;

use App\User;
use App\Enums\User\Role;
use App\Enums\User\Status;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * ユーザーは会員を閲覧できるか判定
     *
     * @param  App\User  $user
     * @param  App\User  $model
     * @return bool
     */
    public function view(User $user, User $model): bool
    {
        return $model->role === Role::Normal && $user->store_id === $model->store_id && $model->status !== Status::Cancel;
    }
}
