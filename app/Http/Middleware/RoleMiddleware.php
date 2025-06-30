<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('auth.index')->with('error', 'Anda harus login terlebih dahulu');
        }

        $user = Auth::user();

        // Cek apakah user memiliki role yang sesuai
        // Asumsi: user memiliki kolom 'role' atau relasi 'role'
        if ($user->role !== $role) {
            // Redirect berdasarkan role user
            if ($user->role === 'Admin') {
                return redirect()->route('kehadiran.index')->with('error', 'Akses ditolak');
            } elseif ($user->role === 'Pegawai') {
                return redirect()->route('daftar-hadir')->with('error', 'Akses ditolak');
            } else {
                return redirect()->route('home')->with('error', 'Akses ditolak');
            }
        }

        return $next($request);
    }
}