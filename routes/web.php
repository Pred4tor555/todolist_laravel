<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello', ['title' => 2*5152]);
});

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);



Route::get('/task/create', [TaskController::class, 'create']);
Route::post('/task', [TaskController::class, 'store']);

Route::get('/task/edit/{id}', [TaskController::class, 'edit']);
Route::post('/task/update/{id}', [TaskController::class, 'update']);

Route::get('/task', [TaskController::class, 'index']);
Route::get('/task/{id}', [TaskController::class, 'show']);

Route::get('/task/destroy/{id}', [TaskController::class, 'destroy']);



Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/achievement/{id}', [AchievementController::class, 'show']);




