<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'title',
        'icon',
        'description',
    ];

    public function maps() {
    	return $this->belongsToMany('App\Map');
    }

}