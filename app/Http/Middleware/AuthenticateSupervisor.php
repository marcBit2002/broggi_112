<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateSupervisor
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user && $user->tipus_usuaris_id == 2) {
            return $next($request);
        }

        return redirect('/inici');
    }
}
