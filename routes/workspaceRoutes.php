<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkSpaceController;

// Protected routes
Route::middleware('auth:api')->group(function () {
    Route::get('workspaces', [WorkSpaceController::class, 'index']);
    Route::post('workspaces', [WorkSpaceController::class, 'store']);
    Route::get('workspaces/{id}', [WorkSpaceController::class, 'show']);
    Route::put('workspaces/{id}', [WorkSpaceController::class, 'update']);
    Route::delete('workspaces/{id}', [WorkSpaceController::class, 'destroy']);
});
