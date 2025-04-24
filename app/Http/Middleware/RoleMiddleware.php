<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();
        $userRoles = session('session_roles', []);

        if (!$user || !$userRoles) {

            Alert::error('Warning', 'Unauthorized access.');
            return redirect('/');
        }

        // Cek apakah user memiliki role yang diperbolehkan
        // return $userRoles;
        // dd($roles);
        // dd(session('session_roles'));
        if (!array_intersect($roles, $userRoles)) {
            Alert::error('Warning', 'Unauthorized access.');
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
