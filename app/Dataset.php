<?php

namespace App;

use Auth;
use Carbon\Carbon;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TeamTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dataset extends Model
{
    use Searchable;
    use TeamTrait;
    use SoftDeletes;
    
    protected $appends = ['max_zoom', 'options'];

    protected $hidden = ['file_data'];

    protected $fillable = [
        'title',
        'description',
        'visibility',
        'data',
        'file_data',
        'file_type',
        'type',
        'style',
        'enable_popup',
        'popup_template'
    ];

    public function scopeMyTeam($query)
    {
        return $query->where('team_id', Auth::user()->currentTeam->id);
    }

    public function scopeCommunity($query)
    {
        return $query->where('visibility', 'community');
    }

    public function getMaxZoomAttribute()
    {
        return 10;
    }

    public function getDateAttribute()
    {
        $date = Carbon::parse($this->created_at);

        return $date->format('d-m-Y');
    }

    public function getUrlAttribute()
    {
        if(Auth::user()->currentTeam()->id == $this->team_id) {
            return '/datasets/' . $this->id . '/edit';
        }
        else {
            return '/datasets/' . $this->id . '';
        }

    }

    public function team()
    {
        return $this->belongsTo('App\Team', 'team_id');
    }

    public function deleter()
    {
        return $this->belongsTo('App\User', 'deleted_by');
    }

    public function styles()
    {
        return $this->hasOne('App\Style');
    }

    public function getOptionsAttribute()
    {
        return unserialize($this->styles['content']);
    }

    public function toSearchableArray()
    {
      $record = $this->toArray();

      $record['title'] = $this->title;
      $record['visibility'] = $this->visibility;

      return $record;
    }

}