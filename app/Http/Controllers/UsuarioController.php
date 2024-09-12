<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        // $datos = $request->all();
        // return response()->json($datos);
        $request->validate([
            'name' => 'required|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|max:250|confirmed',
        ]);
                
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();
        return redirect()->route('admin.usuarios.create')
            ->with('info','Se registro al usuario de forma correcta')
            ->with('icono','success');
    }

    public function show(User $usuario)
    { //$usuario = User::finOrFail();
        return view('admin.usuarios.show', compact('usuario'));
    }

    public function edit(User $usuario)
    {
        return view('admin.usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);
    
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->save();
    
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    }
    

    public function destroy(User $usuario)
    {
        //
    }
}
