<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ConsultorioController extends Controller
{
    public function index()
    {
        $consultorios = Consultorio::all(); // viene con la relacion del consultorio
        return view('admin.consultorios.index', compact(('consultorios')));
    }

    public function create()
    {
        return view('admin.consultorios.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'capacidad' => 'required',
            'especialidad' => 'required',
            'estado' => 'required',
        ]);
        // Crear un nuevo consultorio
        Consultorio::create($request->all());

        return redirect()->route('admin.consultorios.index')
            ->with('info', 'Se registro el consultorio de forma correcta')
            ->with('icono', 'success');
    }

    public function show(Consultorio $consultorio)
    {
        return view('admin.consultorios.show', compact('consultorio'));
    }

    public function edit(Consultorio $consultorio)
    {
        return view('admin.consultorios.edit', compact('consultorio'));
    }

    public function update(Request $request, Consultorio $consultorio)
    {
        // dd($request->all());
        // Validación de los datos
        $validatedData = $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'capacidad' => 'required',
            'especialidad' => 'required',
            'estado' => 'required',
        ]);
    
        // Actualizar los datos del consultorio existente
        $consultorio->update($request->all()); // Actualizar el registro específico
    
        return redirect()->route('admin.consultorios.index')
            ->with('info', 'Consultorio actualizado correctamente.')
            ->with('icono', 'success');
    }
    

    public function destroy(Consultorio $consultorio)
    {
        // Verificar si el consultorio tiene un usuario asociado
        if ($consultorio->user) {
            // Si existe un usuario asociado, eliminarlo
            $consultorio->user->delete();
        }
    
        // Eliminar el consultorio
        $consultorio->delete();
    
        return redirect()->route('admin.consultorios.index')
            ->with('info', 'El consultorio se eliminó con éxito')
            ->with('icono', 'success');
    }
    
}
