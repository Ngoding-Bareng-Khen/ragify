<?php

namespace App\Http\Requests\Document;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FinalizeUploadDocumentsRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'original_name' => ['required', 'string'],
            'mime_type' => ['required', 'string', 'max:100'],
            'size' => ['required', 'integer', 'min:1'],
            'total_chunks' => ['required', 'integer', 'min:1'],
        ];
    }

    /**
     * messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'original_name.required' => 'The original name is required.',
            'original_name.string' => 'The original name must be a string.',
            'mime_type.required' => 'The MIME type is required.',
            'mime_type.string' => 'The MIME type must be a string.',
            'mime_type.max' => 'The MIME type must not exceed 100 characters.',
            'size.required' => 'The file size is required.',
            'size.integer' => 'The file size must be an integer.',
            'size.min' => 'The file size must be at least 1 byte.',
            'total_chunks.required' => 'The total chunks is required.',
            'total_chunks.integer' => 'The total chunks must be an integer.',
            'total_chunks.min' => 'The total chunks must be at least 1.',
        ];
    }
}
