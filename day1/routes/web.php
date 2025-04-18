<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}/', [PostController::class, 'show'])->name('posts.show');
Route::get('/edit/{post}/', [PostController::class, 'editPage'])->name('posts.editPage');
Route::put('/posts/{post}/', [PostController::class,'edit'])->name('posts.edit');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
