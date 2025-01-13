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
Route::get('/printpdf', [\App\Http\Controllers\UserController::class, 'printPDF'])->name('printuser');
Route::get('/printexcel', [\App\Http\Controllers\UserController::class, 'userExcel'])->name('exportuser');
Route::get('/productpdf', [\App\Http\Controllers\ProductController::class, 'productPDF'])->name('printproduct');
Route::get('/productexcel', [\App\Http\Controllers\ProductController::class, 'productExcel'])->name('exportproduct');
Route::get('/kategoripdf', [\App\Http\Controllers\KategoriController::class, 'kategoriPDF'])->name('printkategori');
Route::get('/kategoriexcel', [\App\Http\Controllers\KategoriController::class, 'kategoriExcel'])->name('exportkategori');
