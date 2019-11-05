<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            "full"=>"required|min:3",
            "phone"=>"required|numeric",
            "address"=>"required",
            "id_number"=>"required"
         ];
    }
    public function messages()
    {
        return [
            "full.required"=>"Không được để trống họ và tên",
            "full.min"=>"Không đươc nhỏ hơn 3 ký tự",

            "phone.required"=>"Không được để trống số điện thoại",
            "phone.numeric"=>"Số điện thoại phải là số",
            
            "address.required"=>"Không được để trống địa chỉ",
            "id_number.required"=>"Không được để trống số chứng minh thư",
         ];
    }
}
