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
            'nombres' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'licencia_medica' => 'required',
            'especialidad' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'nullable|max:255|confirmed',
        ]);
        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }
        // Crear un nuevo doctor
        $data = $request->all();
        $data['user_id'] = auth()->id();
    
        // Crea el nuevo doctor
        Doctor::create($data);
        $usuario->assignRole('doctor');
    

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
        $validatedData = $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'licencia_medica' => 'required',
            'especialidad' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'nullable|max:255|confirmed',
        ]);
        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }
        // acrualiza un nuevo doctor
        $data = $request->all();
        $data['user_id'] = auth()->id();
    
        // Crea el nuevo doctor
        $doctor->update($data);
    
    
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
