<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackEnd\CountryController;
use App\Http\Middleware\TokenVerificationMiddleware;

Route::prefix('admin')->group(function () {
    Route::get('/countries', [CountryController::class, 'countryList'])
        ->name('country-list')->middleware('permission:country-list');
    Route::get('/country-save-page', [CountryController::class, 'countrySavePage'])
        ->name('country-save-page')->middleware('permission:country-save-page');
    Route::post('/country', [CountryController::class, 'countrySave'])
        ->name('country-save')->middleware('permission:country-save');
    Route::post('/country/{id}', [CountryController::class, 'countryUpdate'])
        ->name('country-Update')->middleware('permission:country-update');
    Route::get('/country/{id}', [CountryController::class, 'countryDelete'])
        ->name('country-delete')->middleware('permission:country-delete');
});
