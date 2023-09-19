<?php

use App\Http\Controllers\postController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [postController::class, 'index']);
Route::get('/posts/{id}', [postController::class, 'show']);