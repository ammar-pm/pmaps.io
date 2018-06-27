<?php

namespace App;

use Carbon\Carbon;
use Laravel\Spark\Team as SparkTeam;
use Illuminate\Database\Eloquent\SoftDeletes;


class Team extends SparkTeam
{

	use SoftDeletes;

    protected $fillable = [
        'name',
        'status',
        'plan',
        'deleted_by',
    ];

    public function getDateAttribute()
    {
        $date = Carbon::parse($this->created_at);

        return $date->format('d-m-Y');
    }

    public function getUrlAttribute()
    {
        return '/authors/' . $this->id . '';
    }

    public function maps() {
    	return $this->hasMany('App\Map', 'team_id')->orderBy('title');
    }

    public function datasets() {
    	return $this->hasMany('App\Dataset', 'team_id')->orderBy('title');
    }

    public function posts() {
    	return $this->hasMany('App\Post', 'team_id')->orderBy('title');
    }

}
