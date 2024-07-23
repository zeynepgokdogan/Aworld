<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'homepage']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/post', [HomeController::class, 'post'])->middleware(['auth', 'admin']);

Route::get('/post_page', [AdminController::class, 'post_page']);
Route::post('add_post', [AdminController::class, 'add_post'])->name('add_post');
