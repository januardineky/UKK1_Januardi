<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class roleauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Memeriksa apakah role pengguna ada dalam daftar yang diberikan
        if (!in_array($request->user()->role, $roles)) {
            // Mengarahkan pengguna ke halaman yang tidak diizinkan atau halaman default
            Alert::warning('403', 'Akses Dilarang');
            return redirect()->back();
        }

        return $next($request);
    }
}
