<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ["name", "slug", "address", "phone", "email", "vat", "description", "user_id", "image"];

    // specifico nome tabella 
    protected $table = "restaurants";

    // per la relazione 1 a 1 tra restaurants e users
    public function users(){
        return $this->belongsTo("App\User");
    }

    // per la relazione 1 a molti tra restaurants e orders
    public function orders(){
        return $this->hasMany("App\Order");
    }

    // per la relazione 1 a molti tra restaurants e foods
    public function foods(){
        return $this->hasMany("App\Food");
    }

    // per la relazione molti a molti tra restaurants e typologies
    public function typologies(){
        return $this->belongsToMany("App\Typology");
    }

}
