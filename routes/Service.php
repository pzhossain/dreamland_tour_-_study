<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackEnd\ServiceController;
use App\Http\Middleware\TokenVerificationMiddleware;
use App\Http\Controllers\BackEnd\ServiceCategoryController;


Route::middleware(TokenVerificationMiddleware::class)->prefix('admin')->group(function () {

    //service category
    Route::get('/service-categories', [ServiceCategoryController::class, 'ServiceCategoryList'])->name('service-category-list');
    Route::get('/service-category-save-page', [ServiceCategoryController::class, 'serviceCategorySavePage'])->name('service-category-save-page');
    Route::post('/save-service-category', [ServiceCategoryController::class, 'saveServiceCategory'])->name('save-service-category');
    Route::post('/update-service-category/{id}', [ServiceCategoryController::class, 'updateServiceCategory'])->name('update-service-category');
    Route::get('/delete-service-category/{id}', [ServiceCategoryController::class, 'deleteServiceCategory'])->name('delete-service-category');


    //service list

    Route::get('/services', [ServiceController::class, 'ServiceList'])->name('service-list');
    Route::get('/service-save-page', [ServiceController::class, 'serviceSavePage'])->name('service-category-save-page');
    Route::post('/service', [ServiceController::class, 'saveService'])->name('save-service');
    Route::post('/service/{id}', [ServiceController::class, 'updateService'])->name('update-service');
    Route::get('/service/{id}', [ServiceController::class, 'deleteService'])->name('delete-service');


});



