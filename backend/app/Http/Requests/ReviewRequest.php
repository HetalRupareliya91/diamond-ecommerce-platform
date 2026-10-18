<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'rating' => ['nullable', 'integer', 'min:0'],
            'comment' => ['nullable', 'string'],
            'is_approved' => ['boolean'],
        ];
    }
}
