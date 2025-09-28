<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeoPoliticalZone extends Model
{
    protected $fillable = ['name', 'slug'];

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
