<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|Numeric' ,
            'quantity' => 'required|Numeric',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'CatId' => 'required'
        ];
        //image|
    }
    public function messages()
    {
         return [
            'name.required' => 'The name field is required.',
            'image.required' => 'The image field is required.',
            'quantity.required' => 'The quantity field is required.',
            'price.required' => 'The price field is required.',
            'CatId.required' => 'The CatId field is required.',
            'price.numeric' => 'The price field is Numeric.',
            'quantity.numeric' => 'The quantity field is Numeric.',
            //'image.image' => 'The image field is image as like jpeg, png, jpg, gif or svg.',
            
        ];
    }
}
