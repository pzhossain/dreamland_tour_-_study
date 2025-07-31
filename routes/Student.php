<?php

use App\Http\Controllers\BackEnd\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\TokenVerificationMiddleware;




Route::middleware([TokenVerificationMiddleware::class])->prefix('admin')->group(function () {

    Route::get('/students', [StudentController::class, 'studentList'])->name('student-list');
    Route::get('/student-save-page', [StudentController::class, 'studentSavePage'])->name('student-save-page');
    Route::post('/student', [StudentController::class, 'studentSave'])->name('student-save');
    Route::post('/student/{id}', [StudentController::class, 'studentUpdate'])->name('student-Update');
    Route::get('/student/{id}', [StudentController::class, 'studentDelete'])->name('student-delete');
});
