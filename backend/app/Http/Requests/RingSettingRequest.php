<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RingSettingRequest extends FormRequest
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
            'style' => ['nullable', 'string', 'max:255'],
            'base_price' => ['nullable', 'numeric', 'min:0'],
            'is_active' => ['boolean'],
        ];
    }
}
