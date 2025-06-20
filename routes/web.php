<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello', ['title' => 2*5152]);
});

Route::get('/category', [CategoryController::class, 'index'])->middleware('auth');
Route::get('/category/{id}', [CategoryController::class, 'show'])->middleware('auth');



Route::get('/task/create', [TaskController::class, 'create'])->middleware('auth');
Route::post('/task', [TaskController::class, 'store'])->middleware('auth');

Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->middleware('auth');
Route::patch('/task/update/{id}', [TaskController::class, 'update'])->middleware('auth');

Route::get('/task', [TaskController::class, 'index'])->middleware('auth');
Route::get('/task/{id}', [TaskController::class, 'show'])->middleware('auth');

Route::delete('/task/destroy/{id}', [TaskController::class, 'destroy'])->middleware('auth');



Route::get('/user/{id}', [UserController::class, 'show'])->middleware('auth');

Route::get('/achievement/{id}', [AchievementController::class, 'show'])->middleware('auth');



Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::post('/auth', [LoginController::class, 'authenticate']);



Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});
