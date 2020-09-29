<?php

namespace App\Policies;

use App\User;
use App\Models\Attendance;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttendancePolicy
{
    use HandlesAuthorization;

    /**
     * 管理画面でユーザーは会員を閲覧・操作できるか判定
     *
     * @param  App\User  $user
     * @param  App\Models\Attendance $attendance
     * @return bool
     */
    public function anyAdmin(User $user, Attendance $attendance): bool
    {
        return $user->organization_id === $attendance->user->organization_id;
    }
}
