<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

// 1. Halaman Home
Route::get('/home', function () {
    return view('home', ['title' => 'Home Page']);
});

// 2. Halaman About
Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog Page']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});

// 3. Halaman Posts (Tugas Modul)
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// 4. Halaman Categories (Tugas Praktek Tambahan)
Route::get('/categories', [CategoryController::class, 'index']);