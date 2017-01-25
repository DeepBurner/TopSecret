<?php

namespace App\Http\Middleware;

use Closure;

class adminm
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
        if($request->user->user_level != 'admin' || $request->user == null){
            return redirect()->back();
        }
        return $next($request);
    }
}
