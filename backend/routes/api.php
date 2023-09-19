<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\postController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [postController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('/posts/{id}', [postController::class, 'show'])->middleware(['auth:sanctum']);

Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/logout', [AuthenticationController::class, 'logout'])->middleware(['auth:sanctum']);
Route::get('/me', [AuthenticationController::class, 'me'])->middleware(['auth:sanctum']);