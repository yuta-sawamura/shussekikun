<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Http\Requests\Admin\AttendanceRequest;

class AttendanceController extends Controller
{
    public function update(AttendanceRequest $request)
    {
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
