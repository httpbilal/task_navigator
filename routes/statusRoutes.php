<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;

// Protected routes
Route::middleware('auth:api')->group(function () {
    Route::get('statuses', [StatusController::class, 'index']);
    Route::post('statuses', [StatusController::class, 'store']);
    Route::get('statuses/{id}', [StatusController::class, 'show']);
    Route::put('statuses/{id}', [StatusController::class, 'update']);
    Route::delete('statuses/{id}', [StatusController::class, 'destroy']);
});
