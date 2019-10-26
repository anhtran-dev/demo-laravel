<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'txtUser' => 'required|min:3|unique:users,username',
            'txtPass' => 'required|min:3',
            'txtRePass' => 'required|same:txtPass',
            'txtEmail' => 'required|email',
        ];
    }
    public function messages(){
        return[
            'txtUser.required' => 'Vui lòng nhập tên tài khoản',
            'txtUser.min' => 'Tên tài khoản nhỏ nhất là 3 kí tự',
            'txtUser.unique' => "Tên tài khoản đã tồn tại",
            'txtPass.required' =>"Vui lòng nhập mật khẩu",
            'txtPass.min' => 'Mật khẩu nhỏ nhất là 3 kí tự',
            'txtRePass.required' => "Nhập lại mật khẩu",
            'txtRePass.same' => "Mật khẩu không giống nhau",
            'txtEmail.required' => "Vui lòng nhập email",
            'txtEmail.email' => "Email sai định dạng",

        ];
    }
}
