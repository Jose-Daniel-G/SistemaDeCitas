<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index()
    {
        $doctores = Doctor::with('user')->get(); // viene con la relacion del doctor
        return view('admin.doctores.index', compact(('doctores')));
    }

    public function create()
    {
        return view('admin.doctores.create');
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
        // Crear un nuevo doctor
        Doctor::create($request->all());

        return redirect()->route('admin.doctores.index')
            ->with('info', 'Se registro el doctor de forma correcta')
            ->with('icono', 'success');
    }

    public function show(Doctor $doctor)
    {
        return view('admin.doctores.show', compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        return view('admin.doctores.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
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
    
        // Actualizar los datos del doctor existente
        $doctor->update($request->all()); // Actualizar el registro específico
    
        return redirect()->route('admin.doctores.index')
            ->with('info', 'Doctor actualizado correctamente.')
            ->with('icono', 'success');
    }
    

    public function destroy(Doctor $doctor)
    {
        // Verificar si el doctor tiene un usuario asociado
        if ($doctor->user) {
            // Si existe un usuario asociado, eliminarlo
            $doctor->user->delete();
        }
    
        // Eliminar el doctor
        $doctor->delete();
    
        return redirect()->route('admin.doctores.index')
            ->with('info', 'El doctor se eliminó con éxito')
            ->with('icono', 'success');
    }
    
}
