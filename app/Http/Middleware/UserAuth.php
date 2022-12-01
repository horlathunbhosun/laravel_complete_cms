<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserAuth
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
        $user = Auth::user()->user_type;
//        dd($user);
        if(!$user == 'users' ){
            $notification = array(
                'message' => 'Hey! You are not authorized to access this page.',
                'alert-type' => 'info'
            );
            return back()->with($notification);
        }
        return $next($request);
    }
}
