<?php

namespace App\Http\Requests\Panel;
use Illuminate\Foundation\Http\FormRequest;
class CategoryRequest extends FormRequest
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
            'title' => 'required|max:15|regex:/^[a-zA-Z\s\-]+$/u',
            'description' => 'nullable|max:50|regex:/^[a-zA-Z\s\-\.,:;]+$/u'
        ];
    }
}
