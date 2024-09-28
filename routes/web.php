<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CategoryController;

Route::get('/', static function () {
    return view('index');
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::get('/login', [AuthController::class, 'show_login'])->name('document.index');
    Route::get('/register', [AuthController::class, 'show_register'])->name('document.index');
});

Route::group([
    'prefix' => 'document'
], function () {
    Route::get('/', [DocumentController::class, 'show_index'])->name('document.index');
    Route::get('/create', [DocumentController::class, 'show_create'])->name('document.create');
    Route::get('/update', [DocumentController::class, 'show_update'])->name('document.update');
    Route::get('/detail', [DocumentController::class, 'show_detail'])->name('document.detail');
});

Route::group([
    'prefix' => 'user'
], function () {
    Route::get('/', [UserController::class, 'show_index'])->name('user.index');
    Route::get('/create', [UserController::class, 'show_create'])->name('user.create');
    Route::get('/update', [UserController::class, 'show_update'])->name('user.update');
    Route::get('/detail', [UserController::class, 'show_detail'])->name('user.detail');
});

Route::group([
    'prefix' => 'category'
], function () {
    Route::get('/', [CategoryController::class, 'show_index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'show_create'])->name('category.create');
    Route::get('/update', [CategoryController::class, 'show_update'])->name('category.update');
    Route::get('/detail', [CategoryController::class, 'show_detail'])->name('category.detail');
});

