<?php 

namespace App\Traits;

use Auth;

trait Deleter {

    protected static function boot() { 
        parent::boot(); 

        static::deleting(function($model)  {
            $model->deleted_by = Auth::user()->id;
            $model->save();
        });
    }

}