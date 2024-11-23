<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\handleValidationError;

class addBookRequest extends FormRequest {

    use handleValidationError;

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'title'         => 'required|string|min:2|max:100',
            'description'   => 'required|string|min:5|max:500',
            'bio'           => 'required|string|min:5|max:500',
            'published_at'  => 'required|date',
            'cover'         => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'cat_id'        => 'required|exists:categories,id',
        ];
    }

}
