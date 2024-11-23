<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DateOrNumeric implements ValidationRule {
    public function validate(string $attribute, mixed $value, Closure $fail): void {
        if (!(is_numeric($value) || strtotime($value) !== false)) {
            $fail('The :attribute must be date.');
        }
    }
}
