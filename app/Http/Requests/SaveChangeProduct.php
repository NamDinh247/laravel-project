<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveChangeProduct extends FormRequest
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
            'name' => 'required',
            'category_id' => 'required',
            'shop_id' => 'required',
            'price' => 'required|numeric',
            'thumbnails' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'category_id.required' => 'Vui lòng chọn loại sản phẩm',
            'shop_id.required' => 'Vui lòng chọn tên shop',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'price.numeric' => 'Vui lòng nhập giá sản phẩm phải là số nguyên',
            'thumbnails.required' => 'Vui lòng thêm ảnh sản phẩm',
        ];
    }
}
