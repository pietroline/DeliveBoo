<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ["name", "category_id", "price", "description", "ingredients", "visible", "restaurants_id"];

    // per la relazione 1 a molti tra restaurants e foods
    public function restaurants(){
        return $this->belongsTo("App\Restaurant");
    }

    // per la relazione 1 a molti tra categories e foods
    public function categories(){
        return $this->hasMany("App\Category");
    }

    // per la relazione molti a molti tra orders e foods
    public function orders(){
        return $this->belongsToMany("App/Order");
    }
}
