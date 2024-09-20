<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebController::class, 'index'])->name('index');  
Route::get('/consultorio/{id}',[ WebController::class, 'cargar_datos_consultorios'])->name('cargar_datos_consultorios');
Route::post('/admin/eventos/create',[ EventController::class, 'store'])->name('admin.eventos.store');
Auth::routes();

//RUTAS ADMIN
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');

//RUTAS USUARIOS ADMIN
Route::resource('/admin/usuarios', UsuarioController::class)->names('admin.usuarios')->middleware('auth','can:admin.usuarios');
// Route::get('/admin/usuarios', [UsuarioController::class, 'create'])->name('usuarios.index')->middleware('auth');
// Route::get('/admin/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create')->middleware('auth');
// Route::post('/admin/usuarios/create', [UsuarioController::class, 'store'])->name('usuarios.store')->middleware('auth');
// Route::get('/admin/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show')->middleware('auth');
// Route::get('admin/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit')->middleware('auth');
// Route::put('admin/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update')->middleware('auth');
// Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy')->middleware('auth');

//RUTAS SECRETARIAS ADMIN
Route::resource('/admin/secretarias', SecretariaController::class)->names('admin.secretarias')->middleware('auth','can:admin.secretarias');
//RUTAS PACIENTES ADMIN
Route::resource('/admin/pacientes', PacienteController::class)->names('admin.pacientes')->middleware('auth','can:admin.pacientes');
//RUTAS CONSULTORIOS ADMIN
Route::resource('/admin/consultorios', ConsultorioController::class)->names('admin.consultorios')->middleware('auth','can:admin.consultorios');
// Route::resource('/admin/doctores', DoctorController::class)->names('admin.doctores')->middleware('auth','can:admin.secretarias');
Route::resource('/admin/doctores', DoctorController::class)->names('admin.doctores')->parameters([
    'doctores' => 'doctor'
])->middleware('auth','can:admin.doctores');
Route::resource('/admin/horarios', HorarioController::class)->names('admin.horarios')->middleware('auth','can:admin.horarios');

//AJAX
Route::get('/admin/horarios/consultorio/{id}',[ HorarioController::class, 'cargar_datos_consultorios'])
        ->name('admin.horarios.cargar_datos_consultorios')->middleware('auth');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/user', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth');
