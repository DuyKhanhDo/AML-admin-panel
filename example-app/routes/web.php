<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\UserController;

//auth
// Route::get('/', [AuthController::class, 'viewlogin'])->name('viewlogin');
// Route::get('/viewregister', [AuthController::class, 'viewregister'])->name('viewregister');
// Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/register', [AuthController::class, 'register'])->name('register');
// Route::get('/user', [AuthController::class, 'user'])->name('user');

//admin
Route::get('/media', [MediaController::class, 'mediaList'])->name('media');
Route::get('/ceate_media', [MediaController::class, 'create'])->name('media.create');
Route::post('/store_media', [MediaController::class, 'store'])->name('media.store');
Route::get('/media/{id}/edit', [MediaController::class, 'edit'])->name('media.edit');
Route::put('/media/{id}', [MediaController::class, 'update'])->name('media.update');
Route::delete('/delete_media/{id}', [MediaController::class, 'destroy'])->name('media.destroy');

Route::get('/', [MediaController::class, 'dashboard'])->name('dashboard');

Route::get('/users', [UserController::class, 'user'])->name('user');

Route::get('/category', [CategorieController::class, 'categoryList'])->name('category');
Route::get('/ceate_category', [CategorieController::class, 'create'])->name('category.create');
Route::post('/store_category', [CategorieController::class, 'store'])->name('category.store');
Route::get('/category/{id}/edit', [CategorieController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategorieController::class, 'update'])->name('category.update');
Route::delete('/delete_/{id}', [CategorieController::class, 'destroy'])->name('category.destroy');