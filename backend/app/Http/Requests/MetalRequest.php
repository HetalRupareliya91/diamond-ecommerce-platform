<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MetalRequest extends FormRequest
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
            'purity' => ['nullable', 'string', 'max:255'],
            'price_per_gram' => ['nullable', 'numeric', 'min:0'],
            'is_active' => ['boolean'],
        ];
    }
}
