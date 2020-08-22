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

    public function store(ScheduleRequest $request)
    {
        $this->schedule->fill($request->all())->save();
        return redirect('/admin/schedule')->with('success_message', 'スケジュールを追加しました。');
    }

    public function update(ScheduleRequest $request)
    {
        $schedule = $this->schedule->findByIdOrFail(Auth::user()->organization_id, $request->id);
        $schedule->fill($request->all())->save();

        return redirect('/admin/schedule')->with('success_message', 'スケジュールを編集しました。');
    }

    public function delete(Request $request)
    {
        $schedule = $this->schedule->findByIdOrFail(Auth::user()->organization_id, $request->id);
        $schedule->delete();

        return redirect('/admin/schedule')->with('success_message', 'スケジュールを削除しました。');
    }
}
