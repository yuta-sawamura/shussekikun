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
          return $this->systemRules();
        } elseif (Auth::user()->role === Role::Organization_admin) {
          return $this->organizationAdminRules();
        }
    }

    /**
     * Get the validation rules that apply to the request.
     * システム管理者
     *
     * @return array
     */
    private function systemRules()
    {
        return [
            'organization_id' => 'required|integer',
            'store_id' => 'nullable|integer|required_if:role,' . Role::Store_share . ',' . Role::Normal,
            'category_id' => 'nullable|integer|required_if:role,' . Role::Normal,
            'sei' => 'required|string|max:50',
            'mei' => 'required|string|max:50',
            'sei_kana' => 'nullable|string|max:100',
            'mei_kana' => 'nullable|string|max:100',
            'img' => 'nullable|image',
            'gender' => 'required|integer',
            'email' => 'nullable|unique:users,email,' . $this->id . '|email|max:100|required_unless:role,' . Role::Normal,
            'birth' =>'required|date',
            'role' => "required|in:" . Role::System . ',' . Role::Organization_admin . ',' . Role::Store_share . ',' . Role::Normal,
            'password' => 'nullable|string|min:8|required_unless:role,' . Role::Normal,
            'status' => 'nullable|integer',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     * 組織管理者
     *
     * @return array
     */
   private function organizationAdminRules()
   {
        return [
            'organization_id' => 'nullable|integer',
            'store_id' => 'nullable|integer|required_if:role,' . Role::Store_share . ',' . Role::Normal,
            'category_id' => 'nullable|integer|required_if:role,' . Role::Normal,
            'sei' => 'required|string|max:50',
            'mei' => 'required|string|max:50',
            'sei_kana' => 'nullable|string|max:100',
            'mei_kana' => 'nullable|string|max:100',
            'img' => 'nullable|image',
            'gender' => 'required|integer',
            'email' => 'nullable|unique:users,email,' . $this->id . '|email|max:100|required_if:role,' . Role::Organization_admin . ',' . Role::Store_share,
            'birth' =>'required|date' ,
            'role' => "required|in:" . Role::Organization_admin . ',' . Role::Store_share . ',' . Role::Normal,
            'password' => 'nullable|string|min:8|required_if:role,' . Role::Organization_admin . ',' . Role::Store_share,
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
