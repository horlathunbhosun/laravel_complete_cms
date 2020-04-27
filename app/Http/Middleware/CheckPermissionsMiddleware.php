<?php

namespace App\Http\Middleware;

use Closure;
use App\Post;
use Illuminate\Support\Facades\Auth;

class CheckPermissionsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(! check_user_permissions($request))
        {
            abort(403, "FORBIDDEN ACCESS PLEASE JAPA OR STAY THERE AT YOUR RISK ");
        }
        return $next($request);
    }
}
