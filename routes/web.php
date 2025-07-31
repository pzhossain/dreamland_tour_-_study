<?php

use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\PageController;



//home
Route::get('/',[PageController::class,'home'])->name('home');

Route::middleware([TokenVerificationMiddleware::class])->group(function () {
    //dashboard
Route::prefix('/admin')->group(function () {
    Route::get('/dashboard',[PageController::class,'dashboard'])->name('dashboard');
});

//student dashboard
Route::prefix('/student')->group(function () {
    Route::get('/dashboard',[PageController::class,'studentDashboard'])->name('student-dashboard');
});
});
require_once __DIR__.'/Pages.php';
require_once __DIR__.'/Auth.php';
require_once __DIR__.'/Booking.php';
require_once __DIR__.'/Country.php';
require_once __DIR__.'/SuccessStories.php';
require_once __DIR__.'/Review.php';
require_once __DIR__.'/Service.php';




