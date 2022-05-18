<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Typology;

class TypologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typologies = Typology::all();

        // genero url img food
        $typologies->each(function($typology){
            $this->getUrlTypology($typology);
        });

       
        return response()->json(
            [
                "results" => $typologies,
                "success" => true
            ]
        );
    }

     // funzione per generare url img
     private function getUrlTypology($typology){
        if ($typology->image) {
            if($typology->seed){
                $typology->image = url('img/' . $typology->image);
            }
        } 
    }

    
}