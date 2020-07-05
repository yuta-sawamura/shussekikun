<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|string|max:50',
            'content' => 'required|string'
        ];
    }

    /**
     * エラーメッセージのカスタマイズ
     * @return array
     */
    public function messages()
    {
        return [
            'store_id.required' => '店舗は必須です。',
            'store_id.integer' => '正しく選択してください。',
            'title.required' => 'タイトルは必須です。',
            'title.max:50' => 'タイトルは50文字までです。',
            'content.required' => '本文は必須です。',
        ];
    }
}
