<?php

namespace App\Http\Requests\Seo;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSeoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'url' => ['nullable', 'string', 'max:255'],
            'h1' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'keywords' => ['nullable', 'string'],
            'robots' => ['nullable', 'string'],
            'index' => ['nullable', 'boolean'],
            'follow' => ['nullable', 'boolean'],
        ];
    }
}
