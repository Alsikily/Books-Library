<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\handleValidationError;

class searchRequest extends FormRequest {

    use handleValidationError;

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'searchWord' => 'required|string|max:500'
        ];
    }

}
