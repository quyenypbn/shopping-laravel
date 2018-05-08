<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveNewsRequest extends FormRequest
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
            'title' => [
                'required',
                 Rule::unique('news')->ignore($this->id),
            ],
            'image' => 'image',
            'content' => 'required',
        ];
    }
    public function messages(){
        return [
            'title.required' =>'Vui lòng nhập tiêu đề bài viết',
             'name.unique' => 'Tên tin tức đã tồn tại',
            'image.image' => 'Không đúng định dạng ảnh',
            'content.required' =>'Vui lòng nhập nội dung bài viết',
          
        ];
    }
}
