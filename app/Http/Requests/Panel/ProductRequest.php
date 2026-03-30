<?php

namespace App\Http\Requests\Panel;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:20',
            'description' => 'nullable| max:50',
            'price' => 'required| numeric| min:11',
            'images' => ($this->product ? 'nullable' : 'required') . '|array|min:1|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:' . (1024*3.5),
        ];
    }

}
