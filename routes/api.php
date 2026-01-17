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
});
//TODO implementar middleware que valide si el usuario es admin o si el usuario es el usuario que quiere darse de baja

//TODO implmentar una forma en la que se registre la aplicación válida para poder hacer todo lo propio de un usuario, evitando ataques por sesiones