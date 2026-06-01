<?php

namespace App\Repositories;

use App\Models\ConversationMessageSource;

class ConversationMessageSourceRepository
{    
    /**
     * __construct
     *
     * @param  mixed $model
     * @return void
     */
    public function __construct(private readonly ConversationMessageSource $model) {}
}
