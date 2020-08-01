<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Schedule;
use Auth;
use App\Enums\User\Role;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index (Request $request)
    {
        $params = $request->query();

        if (Auth::check()) {
            $users = User::where('store_id', Auth::user()->store_id)
                ->where('role', Role::Normal)
                ->serachKeyword($params['keyword'] ?? null)
                ->storeFilter($params['store'] ?? null)
                ->categoryFilter($params['category'] ?? null)
                ->genderFilter($params['gender'] ?? null)
                ->orderBy('id', 'desc')
                ->paginate(30);

            $schedules = Schedule::select(
                    'schedules.day',
                    'schedules.id',
                    DB::Raw("CONCAT(classworks.name, ' ', TIME_FORMAT(schedules.start_at, '%H:%i'), '~', TIME_FORMAT(schedules.end_at, '%H:%i')) as name")
                )
                ->join('classworks', 'classworks.id', '=', 'schedules.classwork_id')
                ->where('schedules.store_id', Auth::user()->store_id)
                ->get()
                ->groupBy(function($schedule) {
                    $days = [
                        '日曜日' => 1,
                        '月曜日' => 2,
                        '火曜日' => 3,
                        '水曜日' => 4,
                        '木曜日' => 5,
                        '金曜日' => 6,
                        '土曜日' => 7
                    ];
                    return array_search($schedule['day'], $days);
                })
                ->map(function ($items, $key) {
                    return $items->groupBy('id')->map(function($item) {
                        return $item->pluck('name')->first();
                    });
                });
        }

        return view('home.index')->with([
            'users' => $users ?? null,
            'schedules' => $schedules ?? [],
            'params' => $params,
        ]);
    }
}
