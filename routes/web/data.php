<?php

use App\Http\Controllers\Data\Accounts\UserAccountController;
use App\Http\Controllers\Data\Users\Logs\UserLogsController;
use App\Http\Controllers\Data\Users\Updates\UpdatePasswordsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Data\Users\UsersController;

/*
* prefix: data
* namespace: Data
*/

Route::prefix('accounts')->namespace('Accounts')->group(function () {
    Route::get('user/{user?}', [UserAccountController::class, 'index']);
});


Route::prefix('users')->namespace('Users')->group(function () {
    Route::prefix('logs')->namespace('Logs')->group(function () {
        Route::get('{user}', [UserLogsController::class, 'index']);
    });

    Route::prefix('updates')->namespace('Updates')->group(function () {
        Route::put('password/{user}', [UpdatePasswordsController::class, 'update']);
        Route::post('send-reset-link/{user}', [UpdatePasswordsController::class, 'sendResetLink']);
    });

    Route::get('/', [UsersController::class, 'index']);
    Route::post('/', [UsersController::class, 'store']);
    Route::put('{user}', [UsersController::class, 'update']);
    Route::delete('{user}', [UsersController::class, 'destroy']);
});
