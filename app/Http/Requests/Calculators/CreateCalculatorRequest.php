<?php

namespace App\Http\Requests\Calculators;

use Illuminate\Foundation\Http\FormRequest;

class CreateCalculatorRequest extends FormRequest
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
            'backend' => ['required', 'extensions:php'],
            'frontend' => ['required', 'extensions:js'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'ads_code' => ['nullable']
        ];
    }
}
