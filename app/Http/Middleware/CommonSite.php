<?php

namespace App\Http\Middleware;

use Closure;

use App;
use Config;
use View;
use App\Setting;

class CommonSite
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

        foreach(Setting::get() as $setting){
            Config::set($setting->key, $setting->value);
        }
        

        return $next($request);
    }
}