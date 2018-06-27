<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Auth;

class TeamScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if (Auth::check()) {
            if(Auth::user()->currentTeam()->plan == 'publisher') {
                $builder->where('team_id', Auth::user()->currentTeam->id)->orWhere('visibility', 'community')->orWhere('visibility', 'publishers');
            } elseif(Auth::user()->currentTeam()->plan == 'basic') {
                $builder->where('team_id', Auth::user()->currentTeam->id)->orWhere('visibility', 'community');
            }
        }
    }
}