<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string', 'max:190'],
            'url' => ['nullable', 'url'],
            'icon' => ['nullable', 'string'],
            'parent_id' => ['nullable', 'integer'],
        ];
    }
}
