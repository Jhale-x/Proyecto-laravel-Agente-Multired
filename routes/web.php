<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

Route::get('/', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', function () {
    if (!session()->has('user')) {
        return redirect('/');  
    }
    return view('home');
});

Route::get('/users',[UserController::class, 'index'])->name('users.index');
Route::post('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/{post}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{post}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{post}', [UserController::class, 'destroy'])->name('users.destroy');