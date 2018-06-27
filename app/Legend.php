<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Legend extends Model
{
	protected $table = "map_legend";
	protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'color',
        'icon'
    ];

}
