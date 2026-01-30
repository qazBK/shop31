<?php

namespace App\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;


class AuthRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|min:5',
            'password' => 'required',
        ];
    }
    public  function messages()
    {
        return[
            'email.required'=> 'Почта обязательна',
            'email.email'=> 'Введите коррктный email',
            'email.min'=> 'min = 5',
            'password.required'=> 'Пороль обязателен',
            ];
    }
}
