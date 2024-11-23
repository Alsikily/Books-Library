<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\handleValidationError;

class updateCategoryRequest extends FormRequest {

    use handleValidationError;

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'name' => 'required|string|min:2|max:50'
        ];
    }

}
