<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdate extends FormRequest
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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'price.regex' => 'The price must be in format xxx.xx',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:191',
            'price' => 'required|numeric|min:0|max:999999.99|regex:/^\d{0,10}(\.\d{0,2})?$/',
            'description' => 'required|max:20000|min:20',
            'image' => 'mimes:jpg,jpeg,gif,png',
        ];
    }
}
