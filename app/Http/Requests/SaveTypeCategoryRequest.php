<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class SaveTypeCategoryRequest extends FormRequest
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
           'name' => [
                'required',
                 Rule::unique('type_products')->ignore($this->id),
            ],
          
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên loại sản phẩm',
            'name.unique' => 'Tên loại sản phẩm đã tồn tại',
           
        ];
    }
}