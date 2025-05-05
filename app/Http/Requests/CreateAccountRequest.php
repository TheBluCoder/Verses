<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CreateAccountRequest extends FormRequest
{
    public $stopOnFirstFailure = true;
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
            //
            'username' => 'required|string|unique:users,username',
            'email' => 'required|string|email|unique:users,email',
            'displayName' => 'required|string',
            'password' => ['required', 'string', 'confirmed', Password::min(8)->mixedCase()],
        ];
    }

    protected function  prepareForValidation():void
    {
        $displayName = $this->input('username');
        $this->merge(['displayName' => $displayName]);
    }
}
