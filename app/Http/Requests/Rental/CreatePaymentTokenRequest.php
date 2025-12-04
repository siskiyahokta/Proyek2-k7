<?php

namespace App\Http\Requests\Rental;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentTokenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'console_id' => ['required', 'integer', 'exists:consoles,id'],
            'duration'   => ['required', 'integer', 'min:1', 'max:12'],
        ];
    }
}
