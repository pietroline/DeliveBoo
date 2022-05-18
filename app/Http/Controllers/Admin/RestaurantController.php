<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationRestaurant;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidationRestaurant $request)
    {
        $data = $request->all();
        
        // img
        if(isset($data["img"])){
            $data["image"] = Storage::put("restaurants_image", $data["img"]);   
        }
        
        // creo slug univoco, nel caso in cui il nuovo è già presente nel database ne creo uno diverso, concatenandolo ad un counter
        // Prova-nuovo-restaurant 
        // Prova-nuovo-restaurant-1
        $slug = Str::slug($data['name']);

        $counter = 1;
        while (Restaurant::where('slug', $slug)->first()) {
            $slug = Str::slug($data['name']) . '-' . $counter;
            $counter++;
        }

        $data['slug'] = $slug;
        
        $restaurant = new Restaurant();
        $restaurant->fill($data);
        $restaurant->user_id = Auth::id();
     
        $restaurant->save();

        // verifica le typologies inserite, e popolo tabella pivot
        if($request->typologies){
            $restaurant->typologies()->sync($data["typologies"]);
        }
        
        return redirect()->route('admin.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
