<?php

namespace App\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

trait handleValidationError {

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response() -> json([
            'status' => 'error',
            'messages' => $validator -> errors()
        ], 422));
    }

}
