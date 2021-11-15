<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Superior
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
        if (auth()->user()->is_super) {
            return $next($request);
        }else {
            abort(403, 'You are not a Superior Administrator');
        }
    }
}
