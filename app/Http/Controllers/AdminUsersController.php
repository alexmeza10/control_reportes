<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $users = User::all();
        return view('users.adminuser', compact('users'));
    }

    // Mostrar formulario para crear un nuevo usuario
    public function create()
    {
        return view('users.newuser');
    }

    // Guardar nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'usuario' => 'required|string|max:255|unique:usuarios,usuario',
            'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@zapopan\.gob\.mx$/|unique:usuarios,email',
            'extension' => 'required|string|max:4',
            'rol' => 'required|string|in:admin,user',
        ]);
        
    
        User::create([
            'nombre' => $request->nombre,
            'usuario' => $request->usuario,
            'email' => $request->email,
            'extension' => $request->extension,
            'rol' => $request->rol,
            'unidad' => 'Redes y Telecomunicaciones',
            'password' => Hash::make('12345678'),
            'activo' => 1,
        ]);
        
        return redirect()->route('users.adminusers')->with('success', 'Usuario creado correctamente.');
    }
    

    // Mostrar formulario para editar un usuario
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edituser', compact('user'));
    }

    // Actualizar datos del usuario
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $request->validate([
            'nombre' => 'required|string|max:255',
            'usuario' => 'required|string|max:255|unique:usuarios,usuario,' . $user->id,
            'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@zapopan\.gob\.mx$/|unique:usuarios,email,' . $user->id,
            'extension' => 'required|string|max:4',
            'rol' => 'required|string|in:admin,user',
            'activo' => 'required|boolean',
        ]);
    
        $user->update([
            'nombre' => $request->nombre,
            'usuario' => $request->usuario,
            'email' => $request->email,
            'extension' => $request->extension,
            'rol' => $request->rol,
            'activo' => $request->activo,
        ]);
    
        return redirect()->route('users.adminusers')->with('success', 'Usuario actualizado correctamente.');
    }
    
    // Eliminar usuario
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->update(['activo' => 0]);
    
        return redirect()->route('users.adminusers')->with('success', 'Usuario desactivado correctamente.');
    }
    
}
