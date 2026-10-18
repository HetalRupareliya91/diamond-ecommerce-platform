<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $required = $this->isMethod('post') ? 'required' : 'sometimes';

        return [
            'name' => [$required, 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'preferred_date' => ['nullable', 'date'],
            'notes' => ['nullable', 'string'],
        ];
    }
}
