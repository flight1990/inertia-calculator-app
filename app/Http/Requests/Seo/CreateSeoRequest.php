<?php

namespace App\Http\Requests\Seo;

use Illuminate\Foundation\Http\FormRequest;

class CreateSeoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'url' => ['required', 'url', 'max:255'],
            'h1' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'keywords' => ['nullable', 'string'],
            'robots' => ['nullable', 'string'],
            'no_index' => ['nullable', 'boolean'],
            'no_follow' => ['nullable', 'boolean'],
        ];
    }
}
