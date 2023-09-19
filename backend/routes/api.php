<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\postController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

# Route Auth
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/me', [AuthenticationController::class, 'me']);
    Route::post('/posts', [postController::class, 'store']);
    Route::put('/posts/{id}', [postController::class, 'update'])->middleware('pemilik-post');
    Route::delete('/posts/{id}', [postController::class, 'destroy'])->middleware('pemilik-post');
});

# Route Post
Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/posts', [postController::class, 'index']);
Route::get('/posts/{id}', [postController::class, 'show']);
