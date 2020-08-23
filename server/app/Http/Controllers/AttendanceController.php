<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Attendance;
use App\Http\Requests\AttendanceRequest;

class AttendanceController extends Controller
{

    public function __construct()
    {
        $this->today = Carbon::today()->format('Y-m-d');
    }

    public function store(AttendanceRequest $request)
    {
        $attendance = Attendance::firstOrNew([
            'user_id' => $request->user_id,
            'schedule_id' => $request->schedule_id,
            'date' => $this->today
        ]);
        $request['date'] = $this->today;
        $attendance->fill($request->all())->save();

        return redirect('/')->with('success_message', '出席しました。');
    }

    public function storeMultiple(AttendanceRequest $request)
    {
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
