@extends('layouts.full-screen-layout')

@section('content')
    <div class="relative z-1 bg-white p-6 sm:p-0 dark:bg-gray-900">
        <div class="relative flex h-screen w-full flex-col justify-center sm:p-0 lg:flex-row dark:bg-gray-900">
            <!-- Form -->
            <div class="flex w-full flex-1 flex-col lg:w-1/2">
                <div class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center">
                    <div>
                        <div class="mb-5 sm:mb-8">
                            @if (session('error') || $errors->has('error'))
                                <div class="mb-5">
                                    <x-ui.alert
                                        variant="error"
                                        title="Unauthenticated"
                                        :message="session('error') ?? $errors->first('error')" />
                                </div>
                            @endif

                            <h1 class="text-title-sm sm:text-title-md mb-2 font-semibold text-gray-800 dark:text-white/90">
                                Sign In
                            </h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Enter your email and password to sign in!
                            </p>
                        </div>
                        <div>
                            <x-ui.button variant="custom" size="none"
                                className="w-full inline-flex items-center justify-center gap-3 rounded-lg bg-gray-100 px-7 py-3 text-sm font-normal text-gray-700 transition-colors hover:bg-gray-200 hover:text-gray-800 dark:bg-white/5 dark:text-white/90 dark:hover:bg-white/10">
                                <i class="fa-brands fa-google"></i>
                                Sign in with Google
                            </x-ui.button>
                            <div class="relative py-3 sm:py-5">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-200 dark:border-gray-800"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="bg-white p-2 text-gray-400 sm:px-5 sm:py-2 dark:bg-gray-900">Or</span>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('auth.sign-in.post') }}">
                                @csrf
                                <div class="space-y-5">
                                    <x-form.input
                                        type="email"
                                        name="email"
                                        label="Email"
                                        placeholder="info@gmail.com"
                                        required />

                                    <x-form.input
                                        type="password"
                                        name="password"
                                        label="Password"
                                        placeholder="Enter your password"
                                        required />
                                    <!-- Button -->
                                    <div>
                                        <x-ui.button type="submit" variant="primary" size="none"
                                            className="flex w-full px-4 py-3 text-sm">
                                            Sign In
                                        </x-ui.button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-brand-950 relative hidden h-full w-full items-center lg:grid lg:w-1/2 dark:bg-white/5">
                <div class="z-1 flex items-center justify-center">
                    <!-- ===== Common Grid Shape Start ===== -->
                    <x-common.grid-shape />
                    <div class="flex max-w-xs flex-col items-center">
                        <a href="/" class="mb-4 block">
                            <img src="/images/logo/auth-logo.svg" alt="Logo" />
                        </a>
                        <p class="text-center text-gray-400 dark:text-white/60">
                            Free and Open-Source Tailwind CSS Admin Dashboard Template
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
