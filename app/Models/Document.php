<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table('documents')]
#[Fillable(['user_id', 'upload_id', 'title', 'original_file_name', 'file_size', 'mime_type', 'temporary_path', 'file_path', 'total_chunks', 'uploaded_chunks', 'status', 'failure_reason', 'uploaded_at'])]
class Document extends Model
{
    use HasUuids;

    // Relationships
    /**
     * user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * casts
     */
    protected function casts(): array
    {
        return [
            'uploaded_at' => 'datetime',
        ];
    }
}
