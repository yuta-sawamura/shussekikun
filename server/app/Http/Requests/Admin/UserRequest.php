<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            'img' => 'nullable|image',
            'gender' => 'nullable|integer',
            'email' => 'nullable|unique:users|email|max:100',
            'birth' =>'required|date' ,
            'role' => 'required|integer',
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
            'email.email' => 'メールアドレスを正しく設定してください。'
        ];
    }

    public function validated(): array
    {
        $validated = parent::validated();
        $validated['organization_id'] = 1;
        $validated['password'] = Hash::make($validated['password']);
        if ($this->has('img')) {
            $path = Storage::disk('s3')->put('avatar', $this->file('img'), 'public');
            $validated['img'] = $path;
        }
        return $validated;
    }
}
