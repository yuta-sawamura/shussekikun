<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Store;
use App\Models\Attendance;
use App\Models\Schedule;
use Auth;
use App\Enums\User\Role;
use App\Enums\User\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\AttendanceRequest;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct(User $user, Schedule $schedule)
    {
        $this->user = $user;
        $this->schedule = $schedule;
        $this->dt = Carbon::now();
    }

    public function index(Request $request)
    {
        $params = $request->query();

        $users = User::where('organization_id', Auth::user()->organization_id)
            ->where('role', '=', Role::Normal)
            ->serach($params)
            ->orderBy('id', 'desc')
            ->paginate(config('const.PAGINATION_PER_PAGE'));

        return view('admin.user.index')->with([
            'users' => $users,
            'params' => $params,
        ]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserRequest $request)
    {
        $this->user->fill($request->validated())->save();
        return redirect('/admin/user')->with('success_message', '会員を追加しました。');
    }

    public function show(User $user, Request $request)
    {
        $attendances = Attendance::where('user_id', $user->id)
            ->orderBy('id', 'desc')
            ->paginate(config('const.PAGINATION_PER_PAGE'));

        $params = $request->query();
        if (!isset($params['year'])) $params['year'] = $this->dt->year;

        // 月別
        for ($i = 1; $i <= 12; $i++) {
            $rank['months'][] = $i . '月';
            $rank['counts'][] = Attendance::where('user_id', $user->id)
                ->whereYear('date', $params['year'])
                ->whereMonth('date', $i)
                ->count();
        }

        return view('admin.user.show')->with([
            'user' => $user,
            'rank' => $rank,
            'params' => $params,
            'attendances' => $attendances,
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.user.edit')->with([
            'user' => $user
        ]);
    }

    public function update(User $user, UserRequest $request)
    {
        $user->fill($request->validated())->save();

        return redirect('/admin/user/show/' . $user->id)->with('success_message', '会員情報を編集しました。');
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect('/admin/user')->with('success_message', '会員を削除しました。');
    }

    public function rank(Request $request)
    {
        $params = $request->query();
        // 累計会員数
        $totalUsersCount = User::where('organization_id', Auth::user()->organization_id)
            ->where('role', Role::Normal)
            ->count();
        // 実働会員数
        $workingUsers = User::select('users.id')
            ->join('attendances', 'attendances.user_id', '=', 'users.id')
            ->where('organization_id', Auth::user()->organization_id)
            ->where('users.role', Role::Normal)
            ->groupBy('users.id')
            ->get();

        $params = $request->query();
        if (!$params) {
            $store = Store::where('organization_id', Auth::user()->organization_id)
                ->orderBy('created_at', 'ASC')
                ->first();
            $params['store'] = $store->id ?? null;
            $params['year'] = $this->dt->year;
        }
        $user = User::where('users.store_id', $params['store'])
            ->where('users.role', Role::Normal)
            ->orderBy('created_at', 'ASC')
            ->first();
        if ($user) {
            for ($i = $user->created_at->format('Y'); $i <= $this->dt->year; $i++) {
                $years[] = strval($i);
            }
            // 年別
            foreach ($years as $key => $year) {
                $yearUsers['years'][] = $year . '年';
                // 累計会員数
                $yearUsers['users_count'][] = User::where('store_id', $params['store'])
                    ->where('users.role', Role::Normal)
                    ->whereYear('created_at', '<=', $year)
                    ->count();
                // 実働会員数
                $workingYearUsers = User::select('users.id')
                    ->join('attendances', 'attendances.user_id', '=', 'users.id')
                    ->where('users.role', Role::Normal)
                    ->where('users.store_id', $params['store'])
                    ->whereYear('attendances.date', $year)
                    ->groupBy('users.id')
                    ->get();
                $yearUsers['working_users_count'][] = $workingYearUsers->count();
                // 入会者数
                $yearUsers['join_users_count'][] = User::where('store_id', $params['store'])
                    ->where('users.role', Role::Normal)
                    ->whereYear('created_at', '=', $year)
                    ->count();
                // 退会者数
                $yearUsers['cancel_users_count'][] = User::where('store_id', $params['store'])
                    ->where('role', Role::Normal)
                    ->whereYear('updated_at', '=', $year)
                    ->where('status', Status::Cancel)
                    ->count();
            }

            // 月別
            for ($i = 1; $i <= 12; $i++) {
                $monthUsers['months'][] = $i . '月';
                $day = $this->dt->setDate($params['year'], $i, 1);
                $dt = Carbon::now();
                $thisDay = $dt->setDate($dt->year, $dt->month, 1);
                if ($day->lte($thisDay)) {
                    // 累計会員数
                    $monthUsers['users_count'][] = User::where('store_id', $params['store'])
                        ->where('users.role', Role::Normal)
                        ->where('created_at', '<=', $dt->setDate($params['year'], $i, 1)->format('Y-m-t'))
                        ->count();
                    // 実働会員数
                    $workingMonthUsers = User::select('users.id')
                        ->join('attendances', 'attendances.user_id', '=', 'users.id')
                        ->where('users.role', Role::Normal)
                        ->where('users.store_id', $params['store'])
                        ->whereYear('attendances.date', $params['year'])
                        ->whereMonth('attendances.date', $i)
                        ->groupBy('users.id')
                        ->get();
                    $monthUsers['working_users_count'][] = $workingMonthUsers->count();
                    // 入会者数
                    $monthUsers['join_users_count'][] = User::where('store_id', $params['store'])
                        ->where('users.role', Role::Normal)
                        ->whereYear('created_at', $params['year'])
                        ->whereMonth('created_at', $i)
                        ->count();
                    // 退会者数
                    $monthUsers['cancel_users_count'][] = User::where('store_id', $params['store'])
                        ->where('role', Role::Normal)
                        ->whereYear('updated_at', $params['year'])
                        ->whereMonth('updated_at', $i)
                        ->where('status', Status::Cancel)
                        ->count();
                } else {
                    $monthUsers['users_count'][] = 0;
                    $monthUsers['working_users_count'][] = 0;
                    $monthUsers['join_users_count'][] = 0;
                    $monthUsers['cancel_users_count'][] = 0;
                }
            }
        }

        return view('admin.user.rank')->with([
            'totalUsersCount' => $totalUsersCount,
            'workingUsersCount' => $workingUsers->count(),
            'yearUsers' => $yearUsers ?? null,
            'monthUsers' => $monthUsers ?? null,
            'params' => $params
        ]);
    }

    public function attendanceEdit(Attendance $attendance)
    {
        $schedules = $this->schedule->findByIdScheduleClass($attendance->user->store_id);

        return view('admin.user.attendance_edit')->with([
            'attendance' => $attendance,
            'schedules' => $schedules
        ]);
    }

    public function attendanceUpdate(Attendance $attendance, AttendanceRequest $request)
    {
        $attendance->fill($request->all())->save();

        return redirect('/admin/user/show/' . $attendance->user_id)->with('success_message', '出席クラスを編集しました。');
    }

    public function attendanceDelete(Attendance $attendance)
    {
        $attendance->delete();

        return redirect('/admin/user/show/' . $attendance->user_id)->with('success_message', '出席クラスを削除しました。');
    }
}
