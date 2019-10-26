<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'sltParent' => 'required',
            'txtName' => 'required|unique:products,name',
            'txtPrice' => 'required',
            'fImages' => 'required|image',
        ];
    }
    public function messages(){
        return[
            'sltParent.required'=>'Chọn danh mục',
            'txtName.required' => 'Nhập tên sản phẩm',
            'txtName.unique' => 'Tên sản phẩm đã tồn tại',
            'txtPrice.required' => 'Nhập giá tiền sản phẩm',
            'fImages.required' => 'Chọn hình ảnh',
            'fImages.image' => ' Sai định dạng hình ảnh',

        ];
    }
}
