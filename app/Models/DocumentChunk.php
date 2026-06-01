<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table('document_chunks')]
#[Fillable(['document_id', 'content', 'chunk_index', 'embedding'])]
class DocumentChunk extends Model
{
    use HasUuids;

    protected function casts(): array
    {
        return [
            'embedding' => 'array',
        ];
    }

    // Relationships
    /**
     * document
     */
    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    /**
     * casts
     */
    protected function casts(): array
    {
        return [
            'embedding' => 'array',
        ];
    }
}
