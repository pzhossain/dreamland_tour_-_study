<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackEnd\CountryController;
use App\Http\Middleware\TokenVerificationMiddleware;

Route::middleware(TokenVerificationMiddleware::class)->prefix('admin')->group(function () {
    Route::get('/countries', [CountryController::class, 'countryList'])->name('country-list');
    Route::get('/country-save-page', [CountryController::class, 'countrySavePage'])->name('country-save-page');
    Route::post('/country', [CountryController::class, 'countrySave'])->name('country-save');
    Route::post('/country/{id}', [CountryController::class, 'countryUpdate'])->name('country-Update');
    Route::get('/country/{id}', [CountryController::class, 'countryDelete'])->name('country-delete');
});
