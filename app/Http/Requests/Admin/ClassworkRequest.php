<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

class ClassworkRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('classworks')->where(function ($query) {
                    return $query->where('organization_id', Auth::user()->organization_id)
                        ->where('name', $this->name);
                }),
            ]
        ];
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {
            if ($this->is('admin/class/store')) {
                return redirect('/admin/class')->with('error_message', 'クラスを追加できませんでした。');
            } elseif ($this->is('admin/class/update/*')) {
                return redirect('/admin/class')->with('error_message', 'クラスを編集できませんでした。');
            }
        }
    }
}
