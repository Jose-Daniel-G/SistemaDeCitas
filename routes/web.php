<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {return view('index'); });
Route::get('/', function () {return view('welcome');});  

Auth::routes();

//RUTAS ADMIN
Route::get('/admin/usuarios', [UsuarioController::class, 'create'])->name('admin.usuarios.index')->middleware('auth');

Route::get('/admin/usuarios/create', [UsuarioController::class, 'create'])
    ->name('admin.usuarios.create')
    ->middleware('auth');
Route::post('/admin/usuarios/create', [UsuarioController::class, 'store'])
    ->name('admin.usuarios.store')
    ->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/user', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth');
