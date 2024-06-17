<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/user', [UserController::class, 'register']);
Route::get('/users', [UserController::class, 'index']);