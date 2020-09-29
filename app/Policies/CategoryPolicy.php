<?php

namespace App\Policies;

use App\User;
use App\Models\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * 管理画面でユーザーはカテゴリーを閲覧・操作できるか判定
     *
     * @param  App\User  $user
     * @param  App\Models\Category $category
     * @return bool
     */
    public function anyAdmin(User $user, Category $category): bool
    {
        return $user->organization_id === $category->organization_id;
    }
}
