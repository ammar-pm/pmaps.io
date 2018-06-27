<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Map;
use App\Dataset;

class IsOwner
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
        if(Auth::user()->currentTeam->plan != 'admin') {

            if ($request->route()->named('edit_post')) {

                $record = Post::findOrFail($request->id);

            } elseif($request->route()->named('edit_map')) {

                $record = Map::findOrFail($request->id);

            } elseif($request->route()->name('edit_dataset')) {
                $record = Dataset::findOrFail($request->id);
            } 

            if (Auth::user()->currentTeam->id != $record->team_id){
                    return redirect('/dashboard');
            }         

        }    

        return $next($request);
    }
}