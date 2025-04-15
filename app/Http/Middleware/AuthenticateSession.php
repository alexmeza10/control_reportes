<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Middleware\AuthenticateSession as BaseAuthenticateSession;

class AuthenticateSession extends BaseAuthenticateSession
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $this->storeCurrentSession($request);
        }

        return $next($request);
    }

    protected function storeCurrentSession($request)
    {
        if (!$request->session()->has('password_hash') &&
            $request->user()) {
            $request->session()->put('password_hash', $request->user()->getAuthPassword());
        }
    }
}
