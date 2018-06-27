<?php

namespace App;

use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Traits\TeamTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use Searchable;
    use TeamTrait;
    use SoftDeletes;
	
    protected $fillable = [
        'title',
        'description',
        'iframe',
        'tags',
        'visibility',
        'share',
        'comments',
    ];

    public function scopeMyTeam($query)
    {
        return $query->where('team_id', Auth::user()->currentTeam->id);
    }

    public function scopeCommunity($query)
    {
        return $query->where('visibility', 'community');
    }

    public function getTagsListAttribute()
    {
        return explode(',', $this->attributes['tags']);
    }

    public function getDateAttribute()
    {
        $date = Carbon::parse($this->created_at);

        return $date->format('d-m-Y');
    }

    public function getUrlAttribute()
    {
        if(Auth::user()->currentTeam()->id == $this->team_id) {
            return '/posts/' . $this->id . '/edit';
        }
        else {
            return '/posts/' . $this->id . '';
        }

    }

    public function team()
    {
        return $this->belongsTo('App\Team', 'team_id');
    }

    public function maps()
    {
        return $this->belongsToMany('App\Map');
    }
    
    public function deleter()
    {
        return $this->belongsTo('App\User', 'deleted_by');
    }

}