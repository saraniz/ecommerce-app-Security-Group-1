<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/signup', function() {
    return view('signup');
});

Route::get('/signin', function() {
    return view('login');
});

Route::get('/dashboard', function() {
    return view('dashboard');
});

Route::get('/explore', function() {
    return view('explore');
});

Route::get('/products/{id}', function($id) {
    return view('product', ['id' => $id]);
});

Route::get('/sellers/{id}', function($id) {
    return view('seller', ['id' => $id]);
});
