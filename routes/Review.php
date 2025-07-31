<?php

use App\Http\Controllers\BackEnd\ReviewController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;


Route::middleware(TokenVerificationMiddleware::class)->prefix('admin')->group(function () {

    Route::get('/reviews', [ReviewController::class, 'reviewList'])->name('review-list');
    Route::get('/review-save-page', [ReviewController::class, 'reviewSavePage'])->name('review-save-page');
    Route::post('/review', [ReviewController::class, 'reviewSave'])->name('review-save');
    Route::post('/review/{id}', [ReviewController::class, 'reviewUpdate'])->name('review-Update');
    Route::get('/review/{id}', [ReviewController::class, 'reviewDelete'])->name('review-delete');
});
