<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeCart extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' =>'required',
            'qty' =>'required',
            'price' =>'required',


        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'please Enter the name',
            'qty.required' => 'please Enter the quantity',
            'price.required' => 'please Enter the price',

        ];
    }
}
