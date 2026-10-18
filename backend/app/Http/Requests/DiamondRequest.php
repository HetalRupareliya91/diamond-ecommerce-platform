<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiamondRequest extends FormRequest
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
            'carat' => ['nullable', 'numeric', 'min:0'],
            'cut' => ['nullable', 'string', 'max:255'],
            'color' => ['nullable', 'string', 'max:255'],
            'clarity' => ['nullable', 'string', 'max:255'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'is_active' => ['boolean'],
        ];
    }
}
