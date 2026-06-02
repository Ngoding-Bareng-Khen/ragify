<?php

use App\Http\Controllers\Api\DocumentChunkController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Application\AiChatController;
use App\Http\Controllers\Application\DashboardController;
use App\Http\Controllers\Application\KnowledgeSourceController;
use App\Http\Controllers\Auth\SignInController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::controller(SignInController::class)->group(function () {
        Route::get('/sign-in', 'page')->name('auth.sign-in');
        Route::post('/sign-in', 'signIn')->name('auth.sign-in.post');
        Route::post('/sign-out', 'signOut')->name('auth.sign-out');
    });
});

Route::middleware('check-auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('app.dashboard');
    });

    Route::prefix('app')->group(function () {
        Route::controller(AiChatController::class)->group(function () {
            Route::get('/ai-chat', 'page')->name('app.ai-chat');
        });

        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', 'page')->name('app.dashboard');
        });

        Route::controller(KnowledgeSourceController::class)->group(function () {
            Route::get('/knowledge-source', 'page')->name('app.knowledge-source');
            Route::post('/knowledge-source', 'store')->name('app.knowledge-source.store');
        });
    });

    // As API Routes
    Route::controller(DocumentChunkController::class)->group(function () {
        Route::post('/api/document-chunks/store-temp', 'storeTemp')->name('api.document-chunk.store-temp');
    });

    Route::controller(DocumentController::class)->group(function () {
        Route::post('/api/documents/{uploadId}/finalize-upload', 'finalizeUpload')->name('api.document.finalize-upload');
    });
});
