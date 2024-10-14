<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para el controlador Marca
Route::resource('marcas', App\Http\Controllers\MarcaController::class);

Route::resource('tenis', App\Http\Controllers\TeniController::class);

