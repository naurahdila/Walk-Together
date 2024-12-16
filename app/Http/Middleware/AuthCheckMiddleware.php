<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna sudah login atau belum
        if (!Auth::check()) {
            // dd('User belum login');
            return redirect()->route('login');
        }
        //  dd('User sudahhhhh login');;
        return $next($request);
    }
}
