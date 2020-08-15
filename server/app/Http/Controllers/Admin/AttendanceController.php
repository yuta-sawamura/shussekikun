<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'schedule_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/user/show/' . $request->user_id)->with('error_message', 'クラスを編集できませんでした。');
        }

        $attendance = Attendance::where('id', $request->id)->firstOrFail();
        $attendance->fill($request->all())->save();

        return redirect('/admin/user/show/' . $request->user_id)->with('success_message', 'クラスを編集しました。');
    }
}
