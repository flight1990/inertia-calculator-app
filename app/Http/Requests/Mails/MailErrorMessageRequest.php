<?php

namespace App\Http\Requests\Mails;

use Illuminate\Foundation\Http\FormRequest;

class MailErrorMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:190'],
            'subject' => ['required', 'string', 'max:190'],
            'email' => ['required', 'email', 'max:190'],
            'message' => ['required', 'string'],
            'url' => ['nullable', 'url'],
            'files' => ['nullable', 'array'],
            'files.*' => ['file', 'max:3000']
        ];
    }
}
