<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table('conversation_message_sources')]
#[Fillable(['conversation_message_id', 'document_chunk_id'])  ]
class ConversationMessageSource extends Model
{
    use HasUuids;

    // Relationships    
    /**
     * conversationMessage
     *
     * @return BelongsTo
     */
    public function conversationMessage(): BelongsTo {
        return $this->belongsTo(ConversationMessage::class);
    }
    
    /**
     * documentChunk
     *
     * @return BelongsTo
     */
    public function documentChunk(): BelongsTo {
        return $this->belongsTo(DocumentChunk::class);
    }
}
