<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use App\User;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $type = Auth::user()->user_type;

            switch ($type) {
                case '1':
                    return redirect('/admin/browse');
                    break;
                case '2':
                    return redirect('/admin/browse');
                default:
                    return redirect('/');
                    break;
            }
        }

        return $next($request);
    }
}
