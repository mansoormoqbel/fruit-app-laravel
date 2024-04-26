<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'=>'required|email',
            'password'=>'required',
        ];
    }
    public function messages()
    {
         return [
            'email.required' => 'The email field is required.',
            'email.email' => 'These credentials do not match our records.',
            'password.required' => 'The password field is required.'
        ];
    }
}
