<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->is('attendance/store')) {
            return [
                'user_id' => 'required|integer',
                'schedule_id' => 'required|integer',
            ];
        } elseif ($this->is('attendance/store_multiple')) {
            return [
                'users.*.user_id' => 'required|integer',
                'schedule_id' => 'required|integer',
            ];
        }
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {
            return back()->with('error_message', '出席できませんでした。');
        }
    }
}
