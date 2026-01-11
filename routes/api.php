<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\Users;

Route::prefix('user')->group(function () {
    Route::get('/test', [Users::class, 'testUser']);
    Route::post('/create', [Users::class, 'createUser']);
    Route::get('/user/{id}', [Users::class, 'getUser']);
    Route::put('/update/{id}', [Users::class, 'updateUser']);
    Route::delete('/delete/{id}', [Users::class, 'deleteUser']);
}); 
//TODO implementar middleware que valide si el usuario es admin o si el usuario es el usuario que quiere darse de baja

//TODO implmentar una forma en la que se registre la aplicación válida para poder hacer todo lo propio de un usuario, evitando ataques por sesiones