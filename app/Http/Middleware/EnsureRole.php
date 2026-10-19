<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureRole
{
    /**
     * Memastikan pengguna memiliki peran (role) tertentu sebelum mengakses route.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (! $request->user()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if ($request->user()->role !== $role) {
            abort(403, 'Akses ditolak. Anda tidak memiliki wewenang untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}