<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::with('doctor', 'consultorio')->get(); // viene con la relacion del horario
        return view('admin.horarios.index', compact('horarios'));
    }

    public function create()
    {
        $doctores = Doctor::all();
        $consultorios = Consultorio::all();
        return view('admin.horarios.create', compact('doctores','consultorios'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'dia' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        Horario::create($request->all());
    

        return redirect()->route('admin.horarios.index')
            ->with('info', 'Se registro el horario de forma correcta')
            ->with('icono', 'success');
    }

    public function show(Horario $horario)
    {
        // $horario =$horario->with('doctor', 'consultorio')->get();
        return view('admin.horarios.show', compact('horario'));
    }

    public function edit(Horario $horario)
    {
        return view('admin.horarios.edit', compact('horario'));
    }

    public function update(Request $request, Horario $horario)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'dia' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        // Crea el nuevo horario
        $horario->update($request->all());
    
    
        return redirect()->route('admin.horarios.index')
            ->with('info', 'Horario actualizado correctamente.')
            ->with('icono', 'success');
    }
    

    public function destroy(Horario $horario)
    {

        // Eliminar el horario
        $horario->delete();
    
        return redirect()->route('admin.horarios.index')
            ->with('info', 'El horario se eliminó con éxito')
            ->with('icono', 'success');
    }
    
}
