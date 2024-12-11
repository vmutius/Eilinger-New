<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register/{locale}', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register/{locale}', [RegisteredUserController::class, 'store']);

    Route::get('login/{locale}', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login/{locale}', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout/{locale}', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
