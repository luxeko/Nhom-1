<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'product_name'          => 'required|max:200|min:5|string',
            'product_price'         => 'required|numeric|min:1',
            'status'                => 'required|in:1,2',
            'contents'              => 'required|string',

        ];
    }
    public function messages()
    {
        return [
            'product_name.required'         => 'Tên không được để rỗng',
            'product_name.max'              => 'Tên không được phép quá 200 ký tự',
            'product_name.min'              => 'Tên không được phép dưới 5 ký tự',
            'product_price.required'        => 'Giá tiền không được để rỗng',
            'product_price.numeric'         => 'Giá tiền phải là kiểu số',
            'product_price.min'             => 'Giá tiền phải lớn hơn 0',
            'status.in'                     => 'Trạng thái không được để trống',
            'status.required'               => 'Trạng thái không được để trống',
            'contents.required'             => 'Nội dung không được để rỗng',
        ];
    }
}
