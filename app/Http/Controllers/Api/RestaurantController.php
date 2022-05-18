<?php

namespace App\Http\Controllers\Api;

use App\Food;
use App\Http\Controllers\Controller;
use App\Restaurant;
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
    private function paginate($items, $perPage = 8, $page = null, $options = [])
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

        // genero url img
        $restaurants->each(function($restaurant){
            $this->getUrlRestaurant($restaurant);
        });

        foreach($restaurants as $restaurant){
            $restaurant["typologies"] = $restaurant->typologies;
        }

        return response()->json(
            [
                "results" => $this->paginate($restaurants),
                "success" => true
            ]
        );
    }

    /**
     * Filtro ristoranti per typologies.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter($filter){

        $allRestaurants = Restaurant::all();

        // genero url img
        $allRestaurants->each(function($restaurant){
            $this->getUrlRestaurant($restaurant);
        });

        // filter è una stringa, è necessario convertirla in array per poi ciclare i valori
        $filter = explode(",", $filter);
       
        // inizialmente setto $restaurantFiltered a tutti i ristoranti 
        $restaurantFiltered = $allRestaurants;

        
        // filtro tutti gli id contenuti nell'array $filter
        for($k=0; $k<count($filter); $k++){


            

            // filtro tutti i ristoranti contenuti in $restaurantFiltered
            foreach($restaurantFiltered as $key =>  $restaurant){


              

                // ogni risotarante potrebbe avere più typologies,
                // quindo itero tutte le typologies, verifico se l'id della typology[iesima] è pari all'id del filter[kesimo]]. 
                // Se la condizione è verificata, 
                // significa che la typology del filter[kesimo] è contenuta nell'elenco delle typologies del ristorante preso in esame
                // allora incremento la variabile flag
                $flag = 0;
                for($i=0; $i<count($restaurant->typologies); $i++){
                    if($restaurant->typologies[$i]->id == $filter[$k]){
                            $flag++;     
                    }
                } 

                // se la variabile flag==0 significa che l'id del filter[kesimo] non è contenuto nell'arrray di typologies di $restaurant
                // quindi elimino il restaurant dal $restaurantFiltered,
                //  in maniera tale da ottenere solo i ristoranti con tutti gli id di typology contenuti in $filterr
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

        // genero url img restaurant
        $this->getUrlRestaurant($restaurant);

        // genero url img food
        $foods->each(function($food){
            $this->getUrlFood($food);
        });


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

    // funzione per generare url img
    private function getUrlRestaurant($restaurant){
        if ($restaurant->image) {
            
            if($restaurant->seed){
                $restaurant->image = url('img/loghi-restaurants/' . $restaurant->image);
            }else{
                $restaurant->image = url('storage/' . $restaurant->image);
            }

        } else {
            $restaurant->image = url("img/LogoDeliveboo640.png");
        }
    }

    // funzione per generare url img
    private function getUrlFood($food){
        if ($food->image) {
           
            if($food->seed){
               
                $food->image = url('img/foto-foods/' . $food->image);
            }else{
                $food->image = url('storage/' . $food->image);
            }

        } else {
            $food->image = url("img/LogoDeliveboo640.png");
        }
    }



}
