<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveChangePassword extends FormRequest
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
            'old_pass' => 'required|min:6',
            'new_pass' => 'required|min:6',
            're_new_pass' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'old_pass.required' => 'Vui lòng nhập mật khẩu cũ',
            'old_pass.min' => 'Vui lòng nhập mật khẩu cũ tối thiểu 6 kí tự',
            'new_pass.required' => 'Vui lòng nhập mật khẩu mới',
            'new_pass.min' => 'Vui lòng nhập mật khẩu mới tối thiểu 6 kí tự',
            're_new_pass.required' => 'Vui lòng nhập lại khẩu mới',
            're_new_pass.min' => 'Vui lòng nhập lại mật khẩu mới tối thiểu 6 kí tự',
        ];
    }
}
