<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});  

Auth::routes();

//RUTAS ADMIN
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
//RUTAS USUARIOS ADMIN
Route::resource('/admin/usuarios', UsuarioController::class)->middleware('auth');
// Route::get('/admin/usuarios', [UsuarioController::class, 'create'])->name('usuarios.index')->middleware('auth');
// Route::get('/admin/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create')->middleware('auth');
// Route::post('/admin/usuarios/create', [UsuarioController::class, 'store'])->name('usuarios.store')->middleware('auth');
// Route::get('/admin/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show')->middleware('auth');
// Route::get('admin/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit')->middleware('auth');
// Route::put('admin/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update')->middleware('auth');
// Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy')->middleware('auth');

//RUTAS SECRETARIAS ADMIN
Route::resource('/admin/secretarias', SecretariaController::class)->names('admin.secretarias')->middleware('auth');
//RUTAS PACIENTES ADMIN
Route::resource('/admin/pacientes', PacienteController::class)->names('admin.pacientes')->middleware('auth');
//RUTAS CONSULTORIOS ADMIN
Route::resource('/admin/consultorios', ConsultorioController::class)->names('admin.consultorios')->middleware('auth');
// Route::resource('/admin/doctores', DoctorController::class)->names('admin.doctores')->middleware('auth');
Route::resource('/admin/doctores', DoctorController::class)->names('admin.doctores')->parameters([
    'doctores' => 'doctor'
])->middleware('auth');
Route::resource('/admin/horarios', HorarioController::class)->names('admin.horarios')->middleware('auth');

//AJAX
Route::get('/admin/horarios/consultorio/{id}',[ HorarioController::class, 'cargar_datos_consultorios'])
        ->name('admin.horarios.cargar_datos_consultorios')->middleware('auth');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/user', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth');
