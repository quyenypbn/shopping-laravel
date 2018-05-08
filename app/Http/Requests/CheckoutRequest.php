<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
           'name'=>'required',
           'gender'=>'required',
           'email'=>'required|email',
           'address'=>'required',
           'phone'=> 'required|phone',
           'message'=>'required'
        ];
    }
    public function messages(){
        return [
           'name.required' =>'Vui lòng nhập tên',
           'gender.required'=>' Vui lòng chọn giới tính',
           'email.required'=>'Vui lòng nhập email',
           'email.email'=>'vui lòng nhập đúng định dạng email',
           'address.required'=>'vui lòng nhập địa chỉ',
           'phone.required'=>'Vui lòng nhập số điện thoại',
           'phone.phone'=>'vui lòng nhập đúng định dạng số điện thoại',
           'message.required'=>'vui lòng nhập ghi chú'
        ];
    }
}
