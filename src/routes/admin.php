<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandControlder;
use App\Http\Controllers\Admin\CategoryController;
use \App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('login',[AdminAuthController::class, 'getLogin'])->name('adminLogin');
Route::post('login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
Route::get('logout', [AdminAuthController::class, 'logout'])->name('adminLogout');

Route::group(['middleware' => 'adminauth'], function () {
    // Admin Dashboard
    Route::get('dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('brands', BrandControlder::class);
    Route::resource('category', CategoryController::class);
    Route::resource('products', ProductController::class);

});


