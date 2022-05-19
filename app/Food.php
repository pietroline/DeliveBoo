<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{

    use SoftDeletes;

    protected $fillable = ["name", "slug", "category_id", "price", "description", "ingredients", "visible", "restaurants_id", "image"];

    // specifico nome tabella
    protected $table = "foods";

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
        return $this->belongsToMany("App\Order");
    }
}
