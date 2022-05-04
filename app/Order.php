<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ["name", "phone", "address", "total", "order_confirmed_date", "restaurant_id"];

    // specifico nome tabella 
    protected $table = "orders";

    // per la relazione 1 a molti tra restaurants e orders
    public function restaurants(){
        return $this->belongsTo("App\Restaurant");
    }

    // per la relazione molti a molti tra orders e foods
    public function foods(){
        return $this->belongsToMany("App\Food");
    }

}
