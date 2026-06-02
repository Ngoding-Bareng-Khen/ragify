<?php

namespace App\Http\Requests\DocumentChunk;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UploadChunkDocumentRequest extends FormRequest
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
            'upload_id' => ['required', 'uuid'],
            'chunk_index' => ['required', 'integer', 'min:0'],
            'total_chunks' => ['required', 'integer', 'min:1'],
            'file' => ['required', 'file'],
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
            'upload_id.required' => 'The upload ID is required.',
            'upload_id.uuid' => 'The upload ID must be a valid UUID.',
            'chunk_index.required' => 'The chunk index is required.',
            'chunk_index.integer' => 'The chunk index must be an integer.',
            'chunk_index.min' => 'The chunk index must be at least 0.',
            'total_chunks.required' => 'The total chunks is required.',
            'total_chunks.integer' => 'The total chunks must be an integer.',
            'total_chunks.min' => 'The total chunks must be at least 1.',
            'file.required' => 'A file chunk is required.',
            'file.file' => 'The uploaded chunk must be a file.',
        ];
    }
}
