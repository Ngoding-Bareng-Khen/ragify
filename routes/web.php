<?php

use App\Http\Controllers\Application\AiChatController;
use App\Http\Controllers\Application\DashboardController;
use App\Http\Controllers\Application\KnowledgeSourceController;
use App\Http\Controllers\Auth\SignInController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::controller(SignInController::class)->group(function () {
        Route::get('/sign-in', 'page')->name('auth.sign-in');
    });
});

Route::middleware('check-auth')->group(function () {
    Route::prefix('app')->group(function () {
        Route::controller(AiChatController::class)->group(function () {
            Route::get('/ai-chat', 'page')->name('app.ai-chat');
        });

        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', 'page')->name('app.dashboard');
        });

        Route::controller(KnowledgeSourceController::class)->group(function () {
            Route::get('/knowledge-source', 'page')->name('app.knowledge-source');
        });
    });

    Route::get('/', function () {
        return redirect()->route('app.dashboard');
    });

});
