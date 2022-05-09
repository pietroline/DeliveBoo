<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Typology;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        $typologies = Typology::all();

        return response()->json(
            [
                "results" => $restaurants,
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
       
        $restaurantFiltered = [];

        // $k è il numero di tipologie presenti nella variabile $filter
        // quindi itero k volte per filtrare i ristoranti rispetto a tutte le tipologie passate per il filtraggio, appunto k
        for($k=0; $k<count($filter); $k++){



            // ciclo tutti i ristoranti
            foreach($allRestaurants as $restaurant){
                
                // ogni ristorante potrebbe avere più di una tipologia
                // quindi ciclo le tipologie di ogni singolo ristorante
                for($i=0; $i<count($restaurant->typologies); $i++){
                    
                    // se il ristorante ha tra le tipologie la tipologia per cui si sta effettuando il filtro, 
                    //salvo il ristorante in questione in una array di ristoranti filtrati
                    if($restaurant->typologies[$i]->id == $filter[$k]){

                        // solo se il ristorante non è già stato incluso nell'array dei ristoranti filtrati 
                        //allora lo inserisco nell'array dei ristoranti filtrati
                        if(!in_array($restaurant, $restaurantFiltered)){
                            $restaurantFiltered[] = $restaurant;
                        }
                        
                    }
                } 
            }

        }
    
        return response()->json(
            [
                'results' => $restaurantFiltered,
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

        $typologies = [];
        foreach($restaurant->typologies as $typology){
            $typologies[] = $typology->name;
        }

        if($restaurant){

            $response = response()->json(
                [
                    "showRestaurant" => $restaurant,
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
