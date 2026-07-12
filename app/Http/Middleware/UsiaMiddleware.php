<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class UsiaMiddleware {
    public function handle($request, Closure $next, $usiaMinimal) {
        if (!Auth::check() || Auth::user()->usia < $usiaMinimal) {
            return redirect('home-custom')->with('error', 'Akses Ditolak! Usia Anda di bawah ' . $usiaMinimal . ' tahun.');
        }
        return $next($request);
    }
}
