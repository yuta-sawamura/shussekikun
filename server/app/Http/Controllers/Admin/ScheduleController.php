<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Schedule;
use Validator;

class ScheduleController extends Controller
{
    public function index ()
    {
        return view('admin.schedule.index')->with([
        ]);
    }

}
