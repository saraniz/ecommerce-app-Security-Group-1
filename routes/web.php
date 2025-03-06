<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/products', function () {
    return view('products');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::prefix('auth')->group(function () {
    Route::get('/', [AuthController::class, 'defaultAuth']);    

    Route::get('/seller/signup', [AuthController::class, 'sellerSignUp'])->name('seller.signup');

    Route::post('/seller/signup', [SellerController::class, 'store'])->name('seller.store');
    
    Route::get('/buyer/signup', [AuthController::class, 'buyerSignUp'])->name('buyer.signup');

    Route::post('/buyer/signup', [UserController::class, 'store'])->name('buyer.store');
    
    Route::get('/signin', [AuthController::class, 'siginIn'])->name('signin');
});