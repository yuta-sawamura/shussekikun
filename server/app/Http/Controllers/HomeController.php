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

    // $days = DB::table('schedules')
    //     ->select(DB::raw(
    //         "CASE day
    //             WHEN 1 THEN
    //                 '日曜日'
    //             WHEN 2 THEN
    //                 '月曜日'
    //             WHEN 3 THEN
    //                 '火曜日'
    //             WHEN 4 THEN
    //                 '水曜日'
    //             WHEN 5 THEN
    //                 '木曜日'
    //             WHEN 6 THEN
    //                 '金曜日'
    //             WHEN 7 THEN
    //                 '土曜日'
    //             END AS day_name"
    //     ))
    //     ->where('store_id', Auth::user()->store_id)
    //     ->groupBy('day_name')
    //     ->pluck('day_name');

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
                return $items->map(function ($item) {
                    return [
                        $item['id'] => $item['name']
                    ];
                });
            });

            //dd($schedules);
    }

        return view('home.index')->with([
            'users' => $users ?? null,
            'schedules' => $schedules ?? null,
            'params' => $params,
        ]);
    }
}
