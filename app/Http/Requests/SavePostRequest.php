<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePostRequest extends FormRequest
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
            //
            'title' => 'required',
            'slug' => 'required',
            'featured' => 'required|image|max:1999',
            'content' => 'required|min:6'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Tên bài viết không được để trống',
            'slug.required' => 'Tên đường dẫn không được để trống',
            'featured.required' => 'Chọn ảnh đại diện!',
            'featured.image' => 'Định dạng file không đúng',
            'featured.max' => 'Kích thước file lớn hơn 2Mb',
            'content.required' => 'Nội dung không được để trống',
            'content.min' => 'Nội dung quá ngắn'
        ];
    }
}
