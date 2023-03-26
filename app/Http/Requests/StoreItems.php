<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItems extends FormRequest
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
            'name' =>'required|unique:items,name,'.$this->id,
            'category' =>'required',
            'price' =>'required',
            'photo'=>'required_without:id',
            'photo'=>'image|mimes:jpg,jpeg,png,svg'

        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'please Enter the name',
            'name.unique' => 'This Name Already Exists',
            'category.required' => 'please select the category',
            'price.required' => 'please Enter the price',

            'photo.required_without'=>'please Enter an image',
            'image' => 'Enter image only',
            'mimes'=>'image type should jpeg,jpg,png,svg only',
        ];
    }
}
