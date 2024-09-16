<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['api'])
->prefix('auth')
->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::post('/login', 'login');
        
        Route::middleware(['auth:api'])->group(function(){
            Route::post('/logout', 'logout');
            Route::post('/refresh', 'refresh');
            Route::post('/me', 'me');
        });

    });
});