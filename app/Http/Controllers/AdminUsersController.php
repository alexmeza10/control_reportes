<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Vinkla\Hashids\Facades\Hashids;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::all()->map(function ($user) {
            $user->hashid = Hashids::encode($user->id);
            return $user;
        });

        return view('users.adminuser', compact('users'));
    }

    public function create()
    {
        return view('users.newuser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'usuario' => 'required|string|max:255|unique:usuarios,usuario',
            'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@zapopan\.gob\.mx$/|unique:usuarios,email',
            'extension' => 'required|string|max:4',
            'rol' => 'required|string|in:admin,user',
        ]);

        $nuevoUsuario = User::create([
            'nombre' => $request->nombre,
            'usuario' => $request->usuario,
            'email' => $request->email,
            'extension' => $request->extension,
            'rol' => $request->rol,
            'unidad' => 'Redes y Telecomunicaciones',
            'password' => Hash::make('12345678'),
            'activo' => 1,
        ]);

        if (auth()->check()) {
            DB::table('BitacoraUsuarios')->insert([
                'UsuarioAfectadoId' => $nuevoUsuario->id,
                'Cambios' => 'Usuario creado con nombre: ' . $nuevoUsuario->nombre,
                'ModificadoPorId' => auth()->id(),
                'ModificadoPorNombre' => auth()->user()->nombre,
                'IpOrigen' => request()->ip(),
            ]);
        }
        return redirect()->route('users.adminusers')->with('success', 'Usuario creado correctamente.');
    }

    public function edit($hashid)
    {
        $id = Hashids::decode($hashid)[0] ?? null;

        if (!$id) {
            abort(404);
        }

        $user = User::findOrFail($id);
        $user->hashid = Hashids::encode($user->id);
        return view('users.edituser', compact('user'));
    }

    public function update(Request $request, $hashid)
    {
        $id = Hashids::decode($hashid)[0] ?? null;

        if (!$id) {
            abort(404);
        }

        $user = User::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'usuario' => 'required|string|max:255|unique:usuarios,usuario,' . $user->id,
            'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@zapopan\.gob\.mx$/|unique:usuarios,email,' . $user->id,
            'extension' => 'required|string|max:4',
            'rol' => 'required|string|in:admin,user',
            'activo' => 'required|boolean',
        ]);

        $original = $user->getOriginal();

        $user->update([
            'nombre' => $request->nombre,
            'usuario' => $request->usuario,
            'email' => $request->email,
            'extension' => $request->extension,
            'rol' => $request->rol,
            'activo' => $request->activo,
        ]);

        $user->refresh();

        $cambios = [];
        $campos = ['nombre', 'usuario', 'email', 'extension', 'rol', 'activo'];

        $nombresCampos = [
            'nombre' => 'Nombre',
            'usuario' => 'Usuario',
            'email' => 'Correo',
            'extension' => 'Extensión',
            'rol' => 'Rol',
            'activo' => 'Activo',
        ];

        foreach ($campos as $campo) {
            $valorOriginal = (string)$original[$campo];
            $valorNuevo = (string)$user->$campo;

            if ($campo == 'activo') {
                $valorOriginal = (int)$valorOriginal;
                $valorNuevo = (int)$valorNuevo;
            }

            if ($valorOriginal !== $valorNuevo) {
                $cambios[] = "{$nombresCampos[$campo]}: {$valorOriginal} → {$valorNuevo}";
            }
        }

        if ($request->filled('password')) {
            $cambios[] = "Contraseña: modificada";
        }

        if (count($cambios) > 0) {
            $cambiosStr = implode(', ', $cambios);

            if (auth()->check()) {
                DB::table('BitacoraUsuarios')->insert([
                    'UsuarioAfectadoId' => $user->id,
                    'Cambios' => $cambiosStr,
                    'ModificadoPorId' => auth()->id(),
                    'ModificadoPorNombre' => auth()->user()->nombre,
                    'IpOrigen' => request()->ip(),
                ]);
            }
        } else {
            DB::table('BitacoraUsuarios')->insert([
                'UsuarioAfectadoId' => $user->id,
                'Cambios' => 'Sin cambios detectados',
                'ModificadoPorId' => auth()->id(),
                'ModificadoPorNombre' => auth()->user()->nombre,
                'IpOrigen' => request()->ip(),
            ]);
        }

        return redirect()->route('users.adminusers')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($hashid)
    {
        $id = Hashids::decode($hashid)[0] ?? null;

        if (!$id) {
            abort(404);
        }

        $user = User::findOrFail($id);
        $user->update(['activo' => 0]);

        if (auth()->check()) {
            DB::table('BitacoraUsuarios')->insert([
                'UsuarioAfectadoId' => $user->id,
                'Cambios' => 'activo: 1 → 0 (usuario desactivado)',
                'ModificadoPorId' => auth()->id(),
                'ModificadoPorNombre' => auth()->user()->nombre,
                'IpOrigen' => request()->ip(),
            ]);
        }

        return redirect()->route('users.adminusers')->with('success', 'Usuario desactivado correctamente.');
    }
}
