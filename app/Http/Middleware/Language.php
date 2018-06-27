<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App;

class Language
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
        if ( Auth::check() ) {

            $language = Auth::user()->language;

            App::setLocale($language);

        } else {

            App::setLocale(config('app.locale'));

        }

        return $next($request);
    }
}
