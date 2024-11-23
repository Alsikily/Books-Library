<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\handleValidationError;

class updateAuthorRequest extends FormRequest {

    use handleValidationError;

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'name' => 'nullable|string|min:2|max:50',
            'email' => 'nullable|email|unique:users,email,' . $this -> route('author'),
            'password' => 'required|min:6|max:50|regex:/[A-Z]/|regex:/[a-z]/|regex:/[@$!%*?&]/'
        ];
    }

    public function messages() {
        return [
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, and one special character.',
        ];
    }

}
