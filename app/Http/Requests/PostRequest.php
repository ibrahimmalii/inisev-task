<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'website_id' => 'required|exists:websites,id',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'title' => 'required|string|max:255|unique:posts,title',
            'description' => 'required|string',
        ];
    }
}
