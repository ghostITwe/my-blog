<?php

use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.post.index');
Route::get('/admin/posts/create', [PostController::class, 'create'])->name('admin.post.create');
Route::post('/admin/posts/create', [PostController::class, 'store'])->name('admin.post.store');
Route::delete('/admin/posts/{post}', [PostController::class, 'destroy'])->name('admin.post.delete');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
