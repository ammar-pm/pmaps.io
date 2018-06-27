<?php

namespace App\Http\Middleware;

use Closure;
use Lang;
use Session;
use Illuminate\Support\Facades\Auth;

class CheckStatus
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
        if (Auth::user()->currentTeam->status == 1) {
            return $next($request);
        } 

        else {
            
            Session::flash('flash_message', Lang::get('common.verificationpending'));

            return redirect('/settings');
        }

  

    }

}
