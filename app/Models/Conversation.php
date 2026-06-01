<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table('conversations')]
#[Fillable(['user_id', 'title', 'last_message_at'])  ]
class Conversation extends Model
{
    use HasUuids;

    // Relationships    
    /**
     * user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
