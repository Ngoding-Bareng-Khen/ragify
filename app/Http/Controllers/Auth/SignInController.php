<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignInRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function __construct(private readonly AuthService $authService) {}

    public function page()
    {
        return view('pages.auth.sign-in');
    }

    public function signIn(SignInRequest $request)
    {
        $credentials = $request->validated();

        return $this->authService->signIn($credentials);
    }

    public function signOut()
    {
        Auth::logout();
        return redirect()->route('auth.sign-in');
    }
}
