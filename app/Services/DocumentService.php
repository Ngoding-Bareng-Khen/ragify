<?php

namespace App\Services;

use App\Repositories\DocumentRepository;
use Illuminate\Support\Facades\Auth;

class DocumentService
{
    private string $tempPath = 'uploads/tmp';

    /**
     * Create a new class instance.
     */
    public function __construct(
        private readonly DocumentRepository $documentChunkService
    ) {}

    public function finalizeUpload(array $data, string $uploadId)
    {
        $documentData = [
            'user_id' => Auth::user()->id,
            'title' => pathinfo($data['original_name'], PATHINFO_FILENAME),
            'original_file_name' => $data['original_name'],
            'file_size' => $data['size'],
            'mime_type' => $data['mime_type'],
            'temporary_path' => "{$this->tempPath}/{$uploadId}",
            'file_path' => null,
            'total_chunks' => $data['total_chunks'],
            'uploaded_chunks' => $data['total_chunks'],
            'status' => 'uploading',
            'failure_reason' => null,
            'uploaded_at' => now(),
        ];

        $document = $this->documentChunkService->upsertByUploadId($documentData, $uploadId);

        return $document;
    }
}
