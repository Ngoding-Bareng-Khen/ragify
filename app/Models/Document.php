<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table('documents')]
#[Fillable(['user_id', 'title', 'original_file_name', 'file_size', 'mime_type', 'file_path', 'status', 'uploaded_at'])  ]
class Document extends Model
{
    use HasUuids;

    // Relationships    
    /**
     * user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
