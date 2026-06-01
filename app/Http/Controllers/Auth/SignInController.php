<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignInController extends Controller
{
    public function page()
    {
        return view("pages.auth.sign-in");
    }
}
