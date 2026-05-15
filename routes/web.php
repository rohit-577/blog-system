<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;

// ─── Public Routes ───────────────────────────────────────────────
Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/search', [BlogController::class, 'search'])->name('blog.search');
Route::get('/filter', [BlogController::class, 'filter'])->name('blog.filter');

// ─── Admin Auth ───────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminBlogController::class, 'dashboard'])->name('dashboard');
        Route::resource('blogs', AdminBlogController::class);
    });
});
