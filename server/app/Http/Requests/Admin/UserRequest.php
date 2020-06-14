<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Enums\User\Role;

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
        if (Auth::user()->role === Role::System) {
            return [
                'organization_id' => 'required|integer',
                'store_id' => 'nullable|integer|required_if:role,' . Role::Store_Share . ',' . Role::Nomal,
                'category_id' => 'nullable|integer|required_if:role,' . Role::Nomal,
                'sei' => 'required|string|max:50',
                'mei' => 'required|string|max:50',
                'sei_kana' => 'nullable|string|max:100',
                'mei_kana' => 'nullable|string|max:100',
                'img' => 'nullable|image',
                'gender' => 'required|integer',
                'email' => 'nullable|unique:users|email|max:100|required_unless:role,' . Role::Nomal,
                'birth' =>'required|date' ,
                'role' => "required|in:" . Role::System . ',' . Role::Organization_admin . ',' . Role::Store_Share . ',' . Role::Nomal,
                'password' => 'nullable|string|min:8|required_unless:role,' . Role::Nomal,
                'status' => 'nullable|integer',
            ];
        } elseif (Auth::user()->role === Role::Organization_admin) {
            return [
                'organization_id' => 'nullable|integer',
                'store_id' => 'nullable|integer|required_if:role,' . Role::Store_Share . ',' . Role::Nomal,
                'category_id' => 'nullable|integer|required_if:role,' . Role::Nomal,
                'sei' => 'required|string|max:50',
                'mei' => 'required|string|max:50',
                'sei_kana' => 'nullable|string|max:100',
                'mei_kana' => 'nullable|string|max:100',
                'img' => 'nullable|image',
                'gender' => 'required|integer',
                'email' => 'nullable|unique:users|email|max:100|required_if:role,' . Role::Organization_admin . ',' . Role::Store_Share,
                'birth' =>'required|date' ,
                'role' => "required|in:" . Role::Organization_admin . ',' . Role::Store_Share . ',' . Role::Nomal,
                'password' => 'nullable|string|min:8|required_if:role,' . Role::Organization_admin . ',' . Role::Store_Share,
                'status' => 'nullable|integer',
            ];
        }
    }

    /**
     * エラーメッセージのカスタマイズ
     * @return array
     */
    public function messages()
    {
        return [
            'role.required' => 'アカウント権限を選択してください。',
            'email.email' => 'メールアドレスを正しく設定してください。',
            'email.required_unless' => 'メールアドレスは必須です。',
            'email.required_if' => 'メールアドレスは必須です。',
            'password.required_unless' => 'パスワードは必須です。',
            'password.required_if' => 'パスワードは必須です。',
            'store_id.required_if' => '店舗は必須です。',
            'category_id.required_if' => 'カテゴリーは必須です。',

        ];
    }

    public function validated(): array
    {
        $validated = parent::validated();
        if (Auth::user()->role === Role::Organization_admin) {
            $validated['organization_id'] = Auth::user()->organization_id;
        }
        $validated['password'] = Hash::make($validated['password']);
        if ($this->has('img')) {
            $path = Storage::disk('s3')->put('avatar', $this->file('img'), 'public');
            $validated['img'] = $path;
        }
        return $validated;
    }
}
