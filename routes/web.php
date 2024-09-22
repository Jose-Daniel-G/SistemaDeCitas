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
use Spatie\Permission\Models\Permission;

Auth::routes();
Route::get('/', [WebController::class, 'index'])->name('index');

//RUTAS ADMIN
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');

//RUTAS USUARIOS ADMIN
Route::resource('/admin/usuarios', UsuarioController::class)->names('admin.usuarios')->middleware('auth', 'can:admin.usuarios');

//RUTAS SECRETARIAS ADMIN
Route::resource('/admin/secretarias', SecretariaController::class)->names('admin.secretarias')->middleware('auth', 'can:admin.secretarias');

//RUTAS PACIENTES ADMIN
Route::resource('/admin/pacientes', PacienteController::class)->names('admin.pacientes')->middleware('auth', 'can:admin.pacientes');

//RUTAS CONSULTORIOS ADMIN
Route::resource('/admin/consultorios', ConsultorioController::class)->names('admin.consultorios')->middleware('auth', 'can:admin.consultorios');

//RUTAS DOCTORES ADMIN
Route::resource('/admin/doctores', DoctorController::class)->names('admin.doctores')->parameters(['doctores' => 'doctor'])->middleware('auth', 'can:admin.doctores');

//RUTAS HORARIOS ADMIN
Route::resource('/admin/horarios', HorarioController::class)->names('admin.horarios')->middleware('auth', 'can:admin.horarios');

//AJAX
Route::get('/consultorio/{id}', [WebController::class, 'cargar_datos_consultorios'])->name('cargar_datos_consultorios')->middleware('auth','can:cargar_datos_consultorios');
Route::get('/cargar_reserva_doctores/{id}', [WebController::class, 'cargar_reserva_doctores'])->name('admin.horarios.cargar_reserva_doctores')->middleware('auth','can:admin.horarios.cargar_reserva_doctores');
Route::get('/admin/ver_reservas/{id}', [AdminController::class, 'ver_reservas'])->name('admin.ver_reservas')->middleware('auth','can:admin.ver_reservas');
Route::get('/admin/horarios/consultorio/{id}', [HorarioController::class, 'cargar_datos_consultorios'])->name('admin.horarios.cargar_datos_consultorios')->middleware('auth');
// Route::post('/admin/eventos/create', [EventController::class, 'store'])->name('admin.eventos.store');
// Route::delete('/admin/eventos/delete/{evento}', [EventController::class, 'destroy'])->name('admin.eventos.destroy');
Route::resource('/admin/eventos', EventController::class)->names('admin.eventos')->middleware('auth', 'can:admin.eventos');



