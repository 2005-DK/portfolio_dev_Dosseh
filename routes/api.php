<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PortfolioController;

Route::prefix('portfolio')->group(function () {
    // Lecture seule pour le frontend public
    Route::get('/projects', [PortfolioController::class, 'projects']);
    Route::get('/skills', [PortfolioController::class, 'skills']);
    Route::get('/skills/{category}', [PortfolioController::class, 'skillsByCategory']);
    Route::get('/posts', [PortfolioController::class, 'posts']);
    Route::get('/posts/{post:slug}', [PortfolioController::class, 'post']);
    
    // Messages - formulaire de contact
    Route::post('/messages', [PortfolioController::class, 'storeMessage']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
