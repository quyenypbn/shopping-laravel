<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveCategoryRequest extends FormRequest
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
            'name' =>[
                'required',
                 // Rule::unique('products')->ignore($this->id),
            ],
            'id_type'=> 'required',
            'quantity' => 'required',
            'unit_price' => 'required',
            'promotion_price' => 'required',
            'unit' => 'required',
            'tinh_trang' => 'required',
            'image' => 'image',
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên sản phẩm',
            // 'name.unique' => 'Tên sản phẩm đã tồn tại',
             'image.image' => 'Không đúng định dạng ảnh',
            'id_type.required'=>'Vui lòng chọn id loại sản phẩm',
            'quantity.required'=>'Vui lòng nhập số lượng sản phẩm',
            'unit_price.required'=>'Vui lòng nhập giá  sản phẩm',
            'promotion_price.required'=>'Vui lòng nhập giá khuyến mại sản phẩm',
            'tinh_trang.required'=>'Vui lòng nhập tình trạng sản phẩm',
            'unit.required'=>'Vui lòng nhập loại sản phẩm',
        ];
    }
}
