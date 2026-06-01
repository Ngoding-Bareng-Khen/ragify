<?php

namespace App\Repositories;

use App\Models\Document;

class DocumentRepository
{    
    /**
     * __construct
     *
     * @param  mixed $model
     * @return void
     */
    public function __construct(private readonly Document $model) {}
}
