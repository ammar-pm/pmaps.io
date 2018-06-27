<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{

    protected $fillable = [
        'dataset_id',
        'content'
    ];

    public function dataset()
    {
        return $this->belongsTo('App\Dataset');
    }
    
}