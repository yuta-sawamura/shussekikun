<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Schedule;
use App\Http\Requests\Admin\ScheduleRequest;

class ScheduleController extends Controller
{
    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    public function index(Request $request)
    {
        $params = $request->query();

        $schedules = Schedule::select(
            'schedules.id',
            'schedules.store_id',
            'schedules.classwork_id',
            'schedules.day',
            'schedules.start_at',
            'schedules.end_at',
            'stores.organization_id',
            'stores.name'
        )
            ->join('stores', 'stores.id', '=', 'schedules.store_id')
            ->where('stores.organization_id', Auth::user()->organization_id)
            ->search($params)
            ->orderBy('schedules.day', 'asc')
            ->orderBy('schedules.start_at', 'asc')
            ->paginate(config('const.PAGINATION_PER_PAGE'));

        return view('admin.schedule.index')->with([
            'schedules' => $schedules,
            'params' => $params,
        ]);
    }

    public function create()
    {
        return view('admin.schedule.create');
    }

    public function store(ScheduleRequest $request)
    {
        $this->schedule->fill($request->all())->save();
        return redirect('/admin/schedule')->with('success_message', 'スケジュールを追加しました。');
    }

    public function edit(Schedule $schedule)
    {
        return view('admin.schedule.edit')->with([
            'schedule' => $schedule
        ]);
    }

    public function update(Schedule $schedule, ScheduleRequest $request)
    {
        $schedule->fill($request->all())->save();

        return redirect('/admin/schedule')->with('success_message', 'スケジュールを編集しました。');
    }

    public function delete(Schedule $schedule)
    {
        $schedule->delete();

        return redirect('/admin/schedule')->with('success_message', 'スケジュールを削除しました。');
    }
}
