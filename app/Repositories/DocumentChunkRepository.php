<?php

namespace App\Repositories;

use App\Models\DocumentChunk;

class DocumentChunkRepository
{    
    /**
     * __construct
     *
     * @param  mixed $model
     * @return void
     */
    public function __construct(private readonly DocumentChunk $model) {}
}
