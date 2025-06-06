<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;



class AuthController extends Controller
{
    public function showlogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $executed = RateLimiter::attempt(
            'login:' . $request->ip(),
            $perMinute = 5,
            function () {}
        );

        if (!$executed) {
            return back()->withErrors(['usuario' => 'Demasiados intentos. Por favor intente más tarde.']);
        }

        $request->validate([
            'usuario' => 'required|string|max:12',
            'password' => 'required|string|min:8|max:12',
            'g-recaptcha-response' => 'required',
        ]);

        // Validar reCAPTCHA con Google
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        $recaptchaResult = $response->json();

        if (!($recaptchaResult['success'] ?? false)) {
            return back()->withErrors(['usuario' => 'Verificación reCAPTCHA fallida. Intenta de nuevo.']);
        }

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

        return redirect('/login')
            ->withCookie(Cookie::forget('remember_web'))
            ->withCookie(Cookie::forget('XSRF-TOKEN'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual no es correcta.']);
        }

        /** @var \App\Models\User $user */

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        Auth::logoutOtherDevices($request->new_password);
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
