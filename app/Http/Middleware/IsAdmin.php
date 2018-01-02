<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
      //Auth::user() - patikrina ar prisilogines useris
      //Auth::user()-> == 1 - patikrina ar useris yra adminas (duomenu bazes laukelis admin)

      if (Auth::user() && Auth::user()->admin == 1){
        return $next($request);
      }
      return redirect('/');
    }
}
