<?php 

namespace App\Traits;
use App\Scopes\TeamScope;
use Auth;

trait TeamTrait {

    protected static function boot() { 
        parent::boot(); 
        
        static::addGlobalScope(new TeamScope);

        static::creating(function($model)  {
            $model->team_id = Auth::user()->currentTeam->id;
        });

		static::deleting(function($model)  {
            $model->deleted_by = Auth::user()->id;
            $model->save();
        });        

    }

}