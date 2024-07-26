<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Solicitar rol
Route::get('/Solicitar_rol', [App\Http\Controllers\SolicitudesController::class, 'Solicitar_rol'])->name('Solicitar_rol');

//Solicitudes
Route::get('/solicitudes', [App\Http\Controllers\SolicitudesController::class, 'solicitudes'])->name('solicitudes');

//Aceptar solicitud
Route::get('/aceptar', [App\Http\Controllers\SolicitudesController::class, 'aceptar'])->name('aceptar');

//Rechazar solicitud 
Route::get('/rechazar', [App\Http\Controllers\SolicitudesController::class, 'rechazar'])->name('rechazar');