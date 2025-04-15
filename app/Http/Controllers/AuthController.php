<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showlogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        // Verifica si el usuario está activo antes de intentar loguear
        $user = User::where('usuario', $request->usuario)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['usuario' => 'Las credenciales no son válidas.']);
        }

        if (!$user->activo) {
            return back()->withErrors(['usuario' => 'Tu usuario está inactivo.']);
        }

        if (Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password])) {
            Auth::logoutOtherDevices($request->password);
            $request->session()->regenerate();
            return redirect()->intended('menu');
        }

        return back()->withErrors(['usuario' => 'Error inesperado al iniciar sesión.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual no es correcta.']);
        }

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();  

        // Cierra sesiones en otros dispositivos tras cambiar la contraseña
        Auth::logoutOtherDevices($request->new_password);

        // Regenerar token de sesión por seguridad
        $request->session()->regenerateToken();


        return back()->with('success', 'Contraseña actualizada correctamente.');
    }

    public function logoutOtherSessions(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        if (!Hash::check($request->password, Auth::user()->password)) {
            return back()->withErrors(['password' => 'La contraseña no es correcta.']);
        }

        Auth::logoutOtherDevices($request->password);

        return back()->with('success', 'Has cerrado sesión en otros dispositivos.');
    }
}
