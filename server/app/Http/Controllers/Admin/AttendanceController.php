<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
            return redirect('/admin/user/show/' . $request->user_id)->with('error_message', '出席クラスを編集できませんでした。');
        }

        $attendance = Attendance::where('id', $request->id)->firstOrFail();
        $attendance->fill($request->all())->save();

        return redirect('/admin/user/show/' . $request->user_id)->with('success_message', '出席クラスを編集しました。');
    }

    public function delete(Request $request)
    {
        $attendance = Attendance::where('id', $request->id)->firstOrFail();
        $user_id = $attendance->user_id;
        $attendance->delete();

        return redirect('/admin/user/show/' . $user_id)->with('success_message', '出席クラスを削除しました。');
    }
}
