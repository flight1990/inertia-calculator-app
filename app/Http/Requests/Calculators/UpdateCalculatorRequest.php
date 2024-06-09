<?php

namespace App\Http\Requests\Calculators;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCalculatorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:190'],
            'description' => ['required', 'string'],
            'backend' => ['nullable', 'file', 'extensions:php'],
            'frontend' => ['nullable', 'file', 'extensions:js'],
            'category_id' => ['required', 'integer', 'exists:categories,id']
        ];
    }
}
