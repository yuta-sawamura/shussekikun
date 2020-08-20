<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string|max:50',
        ];
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {
            if ($this->is('admin/store/store')) {
                return redirect('/admin/store')->with('error_message', '店舗を追加できませんでした。');
            } elseif ($this->is('admin/store/update/*')) {
                return redirect('/admin/store')->with('error_message', '店舗を編集できませんでした。');
            }
        }
    }
}
