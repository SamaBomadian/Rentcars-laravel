<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // إذا لم يكن أدمن يتم توجيهه للصفحة الرئيسية أو إرجاع خطأ
        return redirect('/')->with('error', 'You do not have admin access.');
    }
}
