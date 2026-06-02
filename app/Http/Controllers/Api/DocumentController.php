<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Document\FinalizeUploadDocumentsRequest;
use App\Services\DocumentService;
use App\Support\ApiResponse;

class DocumentController extends Controller
{
    public function __construct(
        private readonly DocumentService $documentService
    ) {}

    public function finalizeUpload(string $uploadId, FinalizeUploadDocumentsRequest $request)
    {
        $document = $this->documentService->finalizeUpload($request->validated(), $uploadId);

        return ApiResponse::success($document, 'Document upload finalized successfully.');
    }
}
