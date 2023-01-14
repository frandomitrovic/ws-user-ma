<?php

use App\Http\Controllers\Data\Users\Logs\UserLogsController;
use App\Http\Controllers\Data\Users\Updates\UpdatePasswordsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Data\Users\UsersController;

/*
* prefix: data
* namespace: Data
*/

Route::prefix('users')->namespace('Users')->group(function () {
    Route::prefix('logs')->namespace('Logs')->group(function () {
        Route::get('{user}', [UserLogsController::class, 'index']);
    });

    Route::prefix('updates')->namespace('Updates')->group(function () {
        Route::put('password/{user}', [UpdatePasswordsController::class, 'update']);
    });

    Route::get('/', [UsersController::class, 'index']);
    Route::post('/', [UsersController::class, 'store']);
    Route::put('{user}', [UsersController::class, 'update']);
    Route::delete('{user}', [UsersController::class, 'destroy']);
});
