<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name'=>'required|max:50',
        'last_name'=>'required|max:50',
        'email'=>'required|unique:users,email',
        'phone' => 'required|string|max:10|unique:users,phone',
        'gender'=>'required|max:4',
        'birth_date' => 'required|date|before:today',
        'password'=>'required|min:6',
        ];
    }
}
