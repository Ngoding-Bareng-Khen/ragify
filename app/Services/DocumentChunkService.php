<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class DocumentChunkService
{
    private string $tempPath = "uploads/tmp";

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function saveDocumentAsTempFile(UploadedFile $file, string $uploadId, int $chunkIndex): string
    {
        $filePath = "{$this->tempPath}/{$uploadId}/chunk_{$chunkIndex}.part";
        $storePath = Storage::disk('local')->put($filePath, file_get_contents($file->getRealPath()));

        return $storePath;
    }
}
