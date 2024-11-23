<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\handleValidationError;

class updateBookRequest extends FormRequest {

    use handleValidationError;

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'title'         => 'nullable|string|min:2|max:100',
            'description'   => 'nullable|string|min:5|max:500',
            'bio'           => 'nullable|string|min:5|max:500',
            'published_at'  => 'nullable|date',
            'cover'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'cat_id'        => 'nullable|exists:categories,id',
        ];
    }

}
