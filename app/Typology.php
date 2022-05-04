<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
    protected $fillable = ["name", "slug", "image"];

    // specifico nome tabella 
    protected $table = "typologies";

    // per la relazione molti a molti tra restaurants e typologies
    public function restaurants(){
        return $this->belongsToMany("App\Restaurant");
    }
}
