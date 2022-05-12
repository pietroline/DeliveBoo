<?php

namespace App\Http\Controllers\Api;

use App\Food;
use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Typology;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class RestaurantController extends Controller
{

    /**
     * Funzione utilizzata per create a partire da un array un istanza di impaginazione manuale
     * vedi https://laravel.com/docs/9.x/pagination#manually-creating-a-paginator
     *
     * @return \Illuminate\Http\Response
     */
    private function paginate($items, $perPage = 9, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();

        return response()->json(
            [
                "results" => $this->paginate($restaurants),
                "success" => true
            ]
        );
    }

    /**
     * Filtro ristoranti per tipologie.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter($filter){

        $allRestaurants = Restaurant::all();

        // filter è una stringa, è necessario convertirla in array per poi ciclare i valori
        $filter = explode(",", $filter);
       
        $restaurantFiltered = $allRestaurants;

        

        
       
        for($k=0; $k<count($filter); $k++){


            

           
            foreach($restaurantFiltered as $key =>  $restaurant){
                $flag = 0;

             
                for($i=0; $i<count($restaurant->typologies); $i++){
                    
                   
                    if($restaurant->typologies[$i]->id == $filter[$k]){
                            $flag++;
                        
                        
                    }
                } 

                if($flag == 0 ){
                    unset($restaurantFiltered[$key], $key); 
                }
            }

        }
        
    
        return response()->json(
            [
                'results' => $this->paginate($restaurantFiltered),
                'success'=> true,
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $restaurant = Restaurant::where("slug", $slug)->first();

        $foods = Food::where([["restaurant_id", $restaurant->id], ["visible", 1]])->get();

        // il tipo di dato del foods[iesimo]->price ritornato è string, quindi converto in double
        foreach($foods as $food){
            $food->price = floatval($food->price);
        }

        $typologies = [];
        foreach($restaurant->typologies as $typology){
            $typologies[] = $typology->name;
        }

        if($restaurant){

            $response = response()->json(
                [
                    "showRestaurant" => $restaurant,
                    "showMenuRestaurant" => $this->paginate($foods),
                    "typologiesRestaurant" => $typologies,
                    "success" => true
                ]
            );

        }else{

            $response = response()->json(
                [
                    "results" => "Non ho trovato risultati",
                    "success" => false
                ]
            );

        }

        return $response;
    }

}
