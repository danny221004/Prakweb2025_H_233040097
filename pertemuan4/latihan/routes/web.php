<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

Route::get('/', function () {
    return view('welcome');
});

// Halaman Home
Route::get('/home', function () {
    return view('home', ['title' => 'Home Page']);
});

// Halaman About
Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog Page']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});

// Halaman Categories (Tugas Praktek Tambahan)
// Route::get('/categories', [CategoryController::class, 'index'])->middleware('auth')->name('categories.index');


// route Halaman Posts
Route::get('/posts', [PostController::class, 'index'])->middleware('auth')->name('posts.index');

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->middleware('auth')->name('posts.show');


// route halaman register 
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');

Route::post('register', [RegisterController::class, 'register'])->middleware('guest');

// route halaman login

Route::get('login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');

Route::post('login', [LoginController::class, 'login'])->middleware('guest');

Route::post('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');


// Route untuk dashboard posts
Route::get('/dashboard', [DashboardPostController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.index');

Route::get('/dashboard/create', [DashboardPostController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.create');

Route::post('/dashboard', [DashboardPostController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.store');

Route::get('/dashboard/{post:slug}', [DashboardPostController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.show');

Route::get('/dashboard/{post:slug}/edit', [DashboardPostController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.edit');

Route::put('/dashboard/{post:slug}', [DashboardPostController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.update');

Route::delete('/dashboard/{post:slug}', [DashboardPostController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.destroy');

// Route resource untuk dashboard categories
Route::resource('categories', CategoryController::class)
    ->middleware(['auth', 'verified']);
