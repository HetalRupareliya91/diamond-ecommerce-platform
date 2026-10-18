<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NecklaceRequest extends FormRequest
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
            'sku' => ['nullable', 'string', 'max:255'],
            'length_cm' => ['nullable', 'numeric', 'min:0'],
            'price' => ['nullable', 'numeric', 'min:0'],
        ];
    }
}
