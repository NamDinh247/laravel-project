<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveShopInfo extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'district' => 'required',
            'city' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên cửa hàng',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'email.required' => 'Vui lòng nhập địa chỉ email',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'district.required' => 'Vui lòng nhập quận huyện',
            'city.required' => 'Vui lòng nhập thành phố',
        ];
    }
}
