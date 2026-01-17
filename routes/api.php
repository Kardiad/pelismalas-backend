<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\Users;

Route::middleware('frontend.only')->prefix('user')->group(function () {
    Route::post('/login', [Users::class, 'login']);
    Route::post('/create', [Users::class, 'createUser']);
});

Route::middleware(['frontend.only', 'logged.user'])->prefix('user')->group(function () {
    Route::get('/test', [Users::class, 'testUser']);
    Route::get('/{id}', [Users::class, 'getUser']);
    Route::put('/{id}', [Users::class, 'updateUser']);
    Route::delete('/{id}', [Users::class, 'deleteUser']);
    Route::post('/logout', [Users::class, 'logOutUser']);
});