<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:190'],
            'email' => ['sometimes', 'email', 'max:190', 'unique:users,email,'.$this['id']],
            'password' => ['sometimes', 'max:190', 'confirmed'],
        ];
    }
}
