<?php

namespace App\Repositories;

use App\Models\Conversation;

class ConversationRepository
{    
    /**
     * __construct
     *
     * @param  mixed $model
     * @return void
     */
    public function __construct(private readonly Conversation $model) {}
}
