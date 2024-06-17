<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificationController;

Route::get('/health', function () {
    return response()->json([
        'status' => 'UP'
    ]);
});
Route::get('/verify-email/{id}', [VerificationController::class, 'verify'])->name('verify.email');
