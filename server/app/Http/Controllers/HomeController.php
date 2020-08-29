<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Schedule;
use Auth;
use App\Enums\User\Role;
use App\Enums\User\Status;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    public function index(Request $request)
    {
        $params = $request->query();

        $users = User::where('store_id', Auth::user()->store_id)
            ->where('role', Role::Normal)
            ->where('status', '!=', Status::Cancel)
            ->serach($params)
            ->orderBy('id', 'desc')
            ->paginate(30);

        if (isset(Auth::user()->store_id)) $schedules = $this->schedule->findByIdScheduleClass(Auth::user()->store_id);

        return view('home.index')->with([
            'users' => $users,
            'schedules' => $schedules ?? [],
            'params' => $params,
        ]);
    }
}
