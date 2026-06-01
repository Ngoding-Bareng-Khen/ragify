<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AiChatController extends Controller
{
    public function page()
    {
        return view('pages.app.ai-chat.index');
    }
}
