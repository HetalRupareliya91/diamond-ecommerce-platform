<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'code' => ['nullable', 'string', 'max:255'],
            'discount_percent' => ['nullable', 'numeric', 'min:0'],
            'expires_on' => ['nullable', 'date'],
            'is_active' => ['boolean'],
        ];
    }
}
