<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class is_admin
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
        if ($request->user() == null)
        {
            return redirect('/');
        }
        if ($request->user()->is_admin == 0)
        {
            return redirect('/');
        }

        return $next($request);
    }
}

