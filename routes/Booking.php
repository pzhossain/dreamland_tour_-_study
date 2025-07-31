<?php

use App\Http\Controllers\BackEnd\BookingController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;



Route::middleware(TokenVerificationMiddleware::class)->prefix('admin')->group(function () {
    Route::get('/bookings', [BookingController::class, 'bookingList'])->name('booking-list');
    Route::get('/booking-save-page', [BookingController::class, 'bookingSavePage'])->name('booking-save-page');
    Route::post('/booking', [BookingController::class, 'bookingSave'])->name('booking-save');
    Route::post('/booking/{id}', [BookingController::class, 'bookingUpdate'])->name('booking-Update');
    Route::get('/booking/{id}', [BookingController::class, 'bookingDelete'])->name('booking-delete');
});
