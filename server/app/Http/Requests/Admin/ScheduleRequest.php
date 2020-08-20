<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
        return [
            'store_id' => 'required|integer',
            'classwork_id' => 'required|integer',
            'day' => 'required|integer',
            'start_at' => 'required|date_format:H:i',
            'end_at' => 'required|date_format:H:i',
        ];
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {
            if ($this->is('admin/schedule/store')) {
                return redirect('/admin/schedule')->with('error_message', 'スケジュールを追加できませんでした。');
            } elseif ($this->is('admin/schedule/update/*')) {
                return redirect('/admin/schedule')->with('error_message', 'スケジュールを編集できませんでした。');
            }
        }
    }
}
