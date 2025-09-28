<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['geo_political_zone_id', 'name', 'slug'];

    public function geoPoliticalZone()
    {
        return $this->belongsTo(GeoPoliticalZone::class);
    }
}
