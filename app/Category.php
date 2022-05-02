<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name", "slug"];

    // per la relazione 1 a molti tra categories e foods
    public function foods(){
        return $this->belongsTo("App\Food");
    }
}
