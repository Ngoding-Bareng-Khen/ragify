<?php

namespace App\Repositories;

use App\Models\Document;

class DocumentRepository
{
    /**
     * __construct
     *
     * @param  mixed  $model
     * @return void
     */
    public function __construct(private readonly Document $model) {}
    
    /**
     * upsertByUploadId
     *
     * @param  mixed $data
     * @param  mixed $uploadId
     * @return Document
     */
    public function upsertByUploadId(array $data, string $uploadId): Document
    {
        return $this->model->updateOrCreate(
            ['upload_id' => $uploadId],
            $data
        );
    }
}
