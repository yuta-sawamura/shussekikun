<?php

namespace App\Policies;

use App\User;
use App\Models\Schedule;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchedulePolicy
{
    use HandlesAuthorization;

    /**
     * 管理画面でユーザーはスケジュールを閲覧・操作できるか判定
     *
     * @param  App\User  $user
     * @param  App\Models\Schedule $schedule
     * @return bool
     */
    public function anyAdmin(User $user, Schedule $schedule): bool
    {
        return $user->organization_id === $schedule->classwork->organization_id;
    }
}
