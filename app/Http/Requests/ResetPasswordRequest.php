<?php

namespace App\Http\Requests;

use App\Traits\HttpResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ResetPasswordRequest extends FormRequest
{
    use HttpResponse;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email',
            'token' => 'required|string',
            'new_password' => [
                'required',
                'string',
                'min:6',
                // 'confirmed',
                // 'regex:/[A-Z]/', // Must contain at least one uppercase letter
                // 'regex:/[a-z]/', // Must contain at least one lowercase letter
                // 'regex:/[0-9]/', // Must contain at least one number
            ],
            'new_password_confirmation' => 'required|same:new_password',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $this->throwValidationException($validator);
    }
}
