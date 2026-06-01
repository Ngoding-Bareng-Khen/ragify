<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private readonly UserRepository $userRepository) {}

    public function signIn(array $credentials)
    {
        $user = $this->userRepository->findByEmail($credentials['email']);

        if (!$user || !password_verify($credentials['password'], $user->password)) {
            return redirect()->back()->withErrors(['error' => 'Invalid credentials'])->withInput();
        }

        Auth::login($user);
        return redirect()->route('app.dashboard');
    }
}
