<?php

namespace App;

use Carbon\Carbon;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Traits\TeamTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class Map extends Model
{
    use Searchable;
    use TeamTrait;
    use SoftDeletes;

    protected $fillable = [
        'team_id',
        'title',
        'location',
        'description',
        'community',
        'measure',
        'coordinates',
        'print',
        'grid',
        'visibility',
        'tags',
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

    public function getDateAttribute()
    {
        $date = Carbon::parse($this->created_at);

        return $date->format('d-m-Y');
    }

    public function getTagsListAttribute()
    {
        return explode(',', $this->attributes['tags']);
    }

    public function getUrlAttribute()
    {
        if(Auth::user()->currentTeam()->id == $this->team_id) {
            return '/maps/' . $this->id . '/edit';
        }
        else {
            return '/maps/' . $this->id . '';
        }

    }

    public function team()
    {
        return $this->belongsTo('App\Team', 'team_id');
    }
    
    public function datasets()
    {
        return $this->belongsToMany('App\Dataset');
    }

    public function tilesets()
    {
        return $this->belongsToMany('App\Tileset');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    
    public function legends()
    {
        return $this->hasMany('App\Legend', 'map_id', 'id');
    }

    public function favorites()
    {
        return $this->belongsToMany('App\User');
    }

    public function deleter()
    {
        return $this->belongsTo('App\User', 'deleted_by');
    }

}
