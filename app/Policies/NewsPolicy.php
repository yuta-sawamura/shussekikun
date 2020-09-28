<?php

namespace App\Policies;

use App\User;
use App\Models\News;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    /**
     * 管理画面でユーザーはお知らせを閲覧・操作できるか判定
     *
     * @param  App\User  $user
     * @param  App\Models\News $news
     * @return bool
     */
    public function anyAdmin(User $user, News $news)
    {
        return $user->organization_id === $news->store->organization_id;
    }

    /**
     * 会員画面でユーザーはお知らせを閲覧できるか判定
     *
     * @param  App\User  $user
     * @param  App\Models\News $news
     * @return bool
     */
    public function view(User $user, News $news)
    {
        return $user->store_id === $news->store_id;
    }
}
