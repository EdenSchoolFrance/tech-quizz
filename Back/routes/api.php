<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;

// Routes publiques pour l'authentification
Route::post('/login', [AuthController::class, 'login']);

// Routes protégées
Route::middleware('\App\Http\Middleware\EnsureAuthenticated::class')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
});