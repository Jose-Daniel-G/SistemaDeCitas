<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Event as CalendarEvent;  // Usa un alias para el modelo Event
use App\Models\Horario;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {   $total_usuarios = User::count();
        $total_secretarias = Secretaria::count();
        $total_pacientes = Paciente::count();
        $total_consultorios = Consultorio::count();
        $total_doctores = Doctor::count();
        $total_horarios = Horario::count();
        
        $consultorios = Consultorio::all();
        $doctores =Doctor::all();
        $eventos = CalendarEvent::all();
        return view('admin.index', compact('total_usuarios', 'total_secretarias', 'total_pacientes', 'total_consultorios', 'total_doctores', 'total_horarios', 'consultorios', 'doctores', 'eventos'));
    }
    public function ver_reservas($id)
    {  
        $eventos = CalendarEvent::where('user_id',$id)->get();
        return view('admin.ver_reservas', compact('eventos'));
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Admin $admin)
    {
        //
    }

    public function edit(Admin $admin)
    {
        //
    }

    public function update(Request $request, Admin $admin)
    {
        //
    }

    public function destroy(Admin $admin)
    {
        //
    }
}
