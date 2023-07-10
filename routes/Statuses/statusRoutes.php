<?php

use App\Http\Controllers\StatusControllers\StatusController;
use Illuminate\Support\Facades\Route;

// Protected routes
Route::middleware('auth:api')->group(function () {
    Route::get('statuses', [StatusController::class, 'index']);
    Route::post('statuses', [StatusController::class, 'store']);
    Route::get('statuses/{id}', [StatusController::class, 'show']);
    Route::put('statuses/{id}', [StatusController::class, 'update']);
    Route::delete('statuses/{id}', [StatusController::class, 'destroy']);
});
