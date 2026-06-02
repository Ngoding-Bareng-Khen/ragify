<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentChunk\UploadChunkDocumentRequest;
use App\Services\DocumentChunkService;
use App\Support\ApiResponse;
use Illuminate\Http\JsonResponse;

class DocumentChunkController extends Controller
{
    public function __construct(
        private readonly DocumentChunkService $documentChunkService
    ) {}

    /**
     * storeTemp
     *
     * @param  mixed  $request
     */
    public function storeTemp(UploadChunkDocumentRequest $request): JsonResponse
    {
        $data = $request->validated();
        $response = $this->documentChunkService->saveDocumentAsTempFile(
            $request->file('file'),
            $data['upload_id'],
            $data['chunk_index']
        );

        return ApiResponse::success([
            'file_path' => $response,
            'upload_id' => $data['upload_id'],
            'chunk_index' => $data['chunk_index'],
        ], 'Chunk uploaded successfully.');
    }
}
