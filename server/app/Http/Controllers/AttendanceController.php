<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use App\Models\Attendance;
use App\User;
use App\Models\Schedule;
use Auth;
use App\Enums\User\Role;

class AttendanceController extends Controller
{

    public function __construct()
    {
        $this->today = Carbon::today()->format('Y-m-d');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'schedule_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return redirect('/')->with('error_message', '出席できませんでした。');
        }

        $attendance = Attendance::firstOrNew([
            'user_id' => $request->user_id,
            'schedule_id' => $request->schedule_id,
            'date' => $this->today
        ]);
        $request['date'] = $this->today;
        $attendance->fill($request->all())->save();

        return redirect('/')->with('success_message', '出席しました。');
    }

    public function storeMultiple(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'users.*.user_id' => 'required|integer',
            'schedule_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return redirect('/')->with('error_message', '出席できませんでした。');
        }

        foreach ($request->users as $user) {
            $attendance = Attendance::firstOrNew([
                'user_id' => $user['user_id'],
                'schedule_id' => $request->schedule_id,
                'date' => $this->today
            ]);
            $request['date'] = $this->today;
            $attendance->fill($request->all())->save();
        }

        return redirect('/')->with('success_message', '出席しました。');
    }
}
