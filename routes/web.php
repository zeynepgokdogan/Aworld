<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

//Route::get('/', [LoginController::class, 'loginpage']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



//Login Page
Route::get('/', [LoginController::class, 'loginpage']);
Route::get('/home', [LoginController::class, 'index'])->middleware('auth')->name('home');


//Add post page
Route::get('/post_page', [AdminController::class, 'post_page']);
Route::post('/add_post', [AdminController::class, 'add_post'])->name('add_post');

//Show post page
Route::get('/show_post', [AdminController::class, 'show_post']);

//Delete post
Route::get('/delete_post/{id}', [AdminController::class, 'delete_post']);

