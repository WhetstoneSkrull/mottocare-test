<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()->is_admin === true) {
            return $next($request);
        }

        else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }
}
