<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Schedule;
use Validator;

class ScheduleController extends Controller
{
    public function index (Request $request)
    {
        $params = $request->query();

        $schedules = Schedule::join('stores','stores.id','=','schedules.store_id')
            ->where('stores.organization_id', Auth::user()->organization_id)
            ->storeFilter($params['store'] ?? null)
            ->classworkFilter($params['classwork'] ?? null)
            ->dayFilter($params['day'] ?? null)
            ->orderBy('stores.id', 'desc')
            ->orderBy('schedules.day', 'asc')
            ->orderBy('schedules.start_at', 'asc')
            ->paginate(20);

        return view('admin.schedule.index')->with([
            'schedules' => $schedules,
            'params' => $params,
        ]);
    }

    public function store (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'store_id' => 'required|integer',
            'classwork_id' => 'required|integer',
            'day' => 'required|integer',
            'start_at' => 'required|date_format:H:i',
            'end_at' => 'required|date_format:H:i',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/schedule')->with('error_message', 'スケジュールを追加できませんでした。');
        }

        $schedule = new Schedule;
        $schedule->fill($request->all())->save();
        return redirect('/admin/schedule')->with('success_message', 'スケジュールを追加しました。');
    }
}
