<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
    protected $fillable = ["name", "slug", "image"];

    // per la relazione molti a molti tra restaurants e typologies
    public function resturants(){
        return $this->belongsToMany("App/Restaurant");
    }
}
