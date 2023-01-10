<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Data\Users\UsersController;

/*
* prefix: data
* namespace: Data
*/

Route::prefix('users')->namespace('Users')->group(function () {
    Route::get('/', [UsersController::class, 'index']);
    Route::post('/', [UsersController::class, 'store']);
    Route::delete('{user}', [UsersController::class, 'destroy']);
});
