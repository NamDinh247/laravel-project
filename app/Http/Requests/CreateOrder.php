<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shipName' => 'required',
            'shipAddress' => 'required',
            'shipPhone' => 'required',
            'shipEmail' => 'required|email',
            'note' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'shipName.required' => 'Vui lòng nhập tên người nhận hàng',
            'shipAddress.required' => 'Vui lòng nhập địa chỉ nhận hàng',
            'shipPhone.required' => 'Vui lòng nhập số điện thoại người nhận hàng',
            'shipEmail.required' => 'Vui lòng nhập email người nhận hàng',
            'shipEmail.email' => 'Vui lòng nhập đúng định dạng email người nhận hàng',
            'note.required' => 'Vui lòng nhập lưu ý khi giao hàng',
        ];
    }
}
