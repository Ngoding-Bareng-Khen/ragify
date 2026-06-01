<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table('conversation_messages')]
#[Fillable(['conversation_id', 'role', 'content'])  ]
class ConversationMessage extends Model
{
    use HasUuids;

    // Relationships    
    /**
     * conversation
     *
     * @return BelongsTo
     */
    public function conversation(): BelongsTo {
        return $this->belongsTo(Conversation::class);
    }
}
