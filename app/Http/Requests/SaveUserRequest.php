<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\exitsEmail;

class SaveUserRequest extends FormRequest
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
            'name' => 'required|min:6|max:255',
            'email' => ['required','email', new exitsEmail], //urique:user
            'password' => 'required|min:6|max:255',
            'confirm' => 'required|same:password',
            'role' => 'required'   
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Yêu cầu nhập tên!',
            'name.min' => 'Nhập tối thiểu 6 ký tự',
            'email' => 'Nhập đúng định dạng email',
            'email.required' => 'Email không được để trống',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'confirm.same' => 'Mật khẩu phải trùng nhau',
            'confirm.required' => 'Phải xác nhận mật khẩu',
            'role' => 'Chọn quyền cho user'
        ];
    }
}
