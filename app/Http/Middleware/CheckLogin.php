<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckLogin
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
        if(Auth::check())
        {
            if(!Auth::user()->email_verified_at)
            {
                $request->session()->flash('not_confirm', 'false');
                return redirect()->route('user.login');    
            }else{
                return $next($request);
            }
        }  else{
            return redirect()->route('user.login');
        }
    }
}
