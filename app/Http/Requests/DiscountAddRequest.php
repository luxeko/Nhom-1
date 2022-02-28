<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountAddRequest extends FormRequest
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
            'discount_name' => 'required|max:200|min:5|string',
            'discount_percent' => 'required|numeric|between:0,100',
            'date_end' => 'required',
            'status' => 'required|in:active,disable',
            'discount_desc' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'discount_name.required'        => 'Tên không được phép rỗng',
            'discount_name.max'             => 'Tên không được phép quá 200 ký tự',
            'discount_name.min'             => 'Tên không được phép dưới 5 ký tự',
            'discount_percent.required'     => 'Phần trăm không được để trống',
            'discount_percent.numeric'      => 'Phẩn trăm là kiểu số',
            'discount_percent.between'      => 'Phần trăm chỉ trong khoảng 0%-100%',
            'date_end.required'             => 'Ngày kết thúc không được để trống',
            'status.in'                     => 'Trạng thái không được để trống',
            'discount_desc.required'        => 'Miêu tả không được để trống',
        ];
    }
}
