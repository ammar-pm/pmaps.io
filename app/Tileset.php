<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tileset extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
        'url',
        'key',
        'sort'
    ];
}