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
       
        return response()->json(
            [
                "results" => $typologies,
                "success" => true
            ]
        );
    }

    
}