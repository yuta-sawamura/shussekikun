<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'organization_id' => 'nullable|integer',
            'store_id' => 'nullable|integer',
            'category_id' => 'nullable|integer',
            'sei' => 'required|string|max:50',
            'mei' => 'required|string|max:50',
            'sei_kana' => 'required|string|max:100',
            'mei_kana' => 'required|string|max:100',
            'img' => 'nullable|string|max:100',
            'gender' => 'nullable|integer',
            'mail' => 'nullable|unique:users|email|max:100',
            'birth' =>'nullable|date' ,
            'role' => 'required|nteger',
            'password' => 'nullable|string|min:8',
            'status' => 'nullable|integer',
        ];
    }

    /**
     * エラーメッセージのカスタマイズ
     * @return array
     */
    public function messages()
    {
      return [
        'role.required' => 'アカウント権限を選択してください。',
      ];
    }
}
