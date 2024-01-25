<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterValidation extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:4',
            'role'     => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter your name.',
            'name.string'   => 'Name must be a string.',
            'name.max'      => 'Name cannot exceed 255 characters.',
            
            'email.required' => 'Email is required.',
            'email.unique'   => 'Email is already taken.',
            'email.max'      => 'Email cannot exceed 255 characters.',
            
            'password.required' => 'Password is required.',
            'password.number'   => 'Password must be a number.',
            'password.min'      => 'Password must be at least 4 numbers.',

            // 'role'            =>'required'
        ];
    }
}
