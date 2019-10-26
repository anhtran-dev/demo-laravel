<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'txtPass' => 'required|min:3',
            'txtRePass' => 'required|same:txtPass',
            'txtEmail' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'txtPass.required' => 'Nhập mật khẩu',
            'txtPass.min' => 'Mật khẩu phải lớn hơn 3 kí tự',
            'txtRePass.required' => 'Nhập lại mật khẩu',
            'txtRePass.same' => 'Mật khẩu không giống nhau',
            'txtEmail.required' => "Vui lòng nhập email",
            'txtEmail.email' => "Email sai định dạng",
        ];
    }
}
