<?php

namespace App\Policies\User;

use App\User;
use App\Models\News;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    /**
     * ユーザーはお知らせを閲覧できるか判定
     *
     * @param  App\User  $user
     * @param  App\Models\News $news
     * @return bool
     */
    public function view(User $user, News $news)
    {
        return $user->store_id == $news->store_id;
    }
}
