<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('theme/dashboard');
});

Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/users', \App\Http\Controllers\UserController::class);
Route::resource('/dashboard', \App\Http\Controllers\DashboardController::class);
Route::resource('/kategoris', \App\Http\Controllers\KategoriController::class);
Route::resource('/satuans', \App\Http\Controllers\SatuanController::class);
Route::resource('/kustomers', \App\Http\Controllers\KustomerController::class);
