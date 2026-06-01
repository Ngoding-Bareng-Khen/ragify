<?php

namespace App\Repositories;

use App\Models\ConversationMessage;

class ConversationMessageRepository
{    
    /**
     * __construct
     *
     * @param  mixed $model
     * @return void
     */
    public function __construct(private readonly ConversationMessage $model) {}
}
