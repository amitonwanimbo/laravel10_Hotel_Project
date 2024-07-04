<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

        public function handle(Request $request, Closure $next, $role)
        {
            if (!auth()->check()) {
                return redirect('/login'); // Redirect ke halaman login jika tidak terotentikasi
            }
            $userRole = auth()->user()->role;

        // Periksa role pengguna dan arahkan ke halaman yang sesuai
        if ($userRole !== $role) {
            switch ($userRole) {
                case 'admin':
                    return redirect('/admin');
                case 'kepala':
                    return redirect('/kepala');
                case 'staf':
                    return redirect('/staf');
                default:
            }
        }
    
            return $next($request);
        }
    
}