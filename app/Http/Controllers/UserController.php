<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Attendance;
use Auth;
use App\Enums\User\Role;
use App\Enums\User\Status;
use Carbon\Carbon;
use DB;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->dt = Carbon::now();
    }

    public function index(Request $request)
    {
        $params = $request->query();

        $users = User::roleStoreStatusFilter([Role::Normal], Auth::user()->store_id, Status::Cancel)
            ->serach($params)
            ->orderBy('id', 'desc')
            ->paginate(config('const.PAGINATION_PER_PAGE'));

        return view('user.index')->with([
            'users' => $users,
            'params' => $params,
        ]);
    }

    public function show(User $user, Request $request)
    {
        $params = $request->query();
        if (!$params) $params['year'] = $this->dt->year;

        // 月別
        for ($i = 1; $i <= 12; $i++) {
            $rank['months'][] = $i . '月';
            $rank['counts'][] = Attendance::where('user_id', $user->id)
                ->whereYear('date', $params['year'])
                ->whereMonth('date', $i)
                ->count();
        }

        return view('user.show')->with([
            'user' => $user,
            'rank' => $rank,
            'params' => $params
        ]);
    }

    public function rank(Request $request)
    {
        $dt = Carbon::now();
        $params = $request->query();

        $yearUsers = User::select(DB::raw('count(*) as attendance_count, users.id as userid, users.sei, users.mei'))
            ->leftJoin('attendances', 'attendances.user_id', '=', 'users.id')
            ->roleStoreStatusFilter([Role::Normal], Auth::user()->store_id, Status::Cancel)
            ->serach($params)
            ->whereYear('attendances.date', $params['year'] ?? $dt->year)
            ->groupBy('userid')
            ->orderBy('attendance_count', 'desc')
            ->take(10)
            ->get();

        if ($yearUsers->isNotEmpty()) {
            $yearUsers = $this->user->getNumbering($yearUsers);
            $yearTitle = $yearUsers['title'];
            $yearCount = $yearUsers['count'];
        }

        $monthlyUsers = User::select(DB::raw('count(*) as attendance_count, users.id as userid, users.sei, users.mei'))
            ->leftJoin('attendances', 'attendances.user_id', '=', 'users.id')
            ->roleStoreStatusFilter([Role::Normal], Auth::user()->store_id, Status::Cancel)
            ->serach($params)
            ->whereYear('attendances.date', $params['year'] ?? $dt->year)
            ->whereMonth('attendances.date', $params['month'] ?? $dt->month)
            ->groupBy('userid')
            ->orderBy('attendance_count', 'desc')
            ->take(10)
            ->get();

        if ($monthlyUsers->isNotEmpty()) {
            $monthlyUsers = $this->user->getNumbering($monthlyUsers);
            $monthlyTitle = $monthlyUsers['title'];
            $monthlyCount = $monthlyUsers['count'];
        }

        return view('user.rank')->with([
            'yearTitle' => $yearTitle ?? '',
            'yearCount' => $yearCount ?? '',
            'monthlyTitle' => $monthlyTitle ?? '',
            'monthlyCount' => $monthlyCount ?? '',
            'params' => $params
        ]);
    }
}
