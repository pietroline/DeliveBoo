<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Food;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationFood;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::where("restaurant_id", Auth::id())->get();    

        // creo variabile(array) con le categorie dei cibi presenti sul DB
        $categories = [];
        foreach($foods as $food){
            $categories[] = Category::where("id", $food->category_id )->first();
        }
        
        return view("admin.foods.index", compact("foods", "categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.foods.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidationFood $request)
    {
        $data = $request->all();

        // img
        if(isset($data["img"])){
            $data["image"] = Storage::put("foods_image", $data["img"]);   
        }
        
        // creo slug univoco, nel caso in cui il nuovo è già presente nel database ne creo uno diverso, concatenandolo ad un counter
        // Prova-nuovo-food 
        // Prova-nuovo-food-1
        $slug = Str::slug($data['name']);

        $counter = 1;
        while (Food::where('slug', $slug)->first()) {
            $slug = Str::slug($data['name']) . '-' . $counter;
            $counter++;
        }

        $data['slug'] = $slug;
       
        $food = new Food();
        $food->fill($data);
        $food->restaurant_id = Auth::id();
     
        $food->save();
        
        return redirect()->route('admin.foods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // determino utente loggato
        $userLogged = Auth::user();

        $food = Food::where('slug', $slug)->first();

        if ($userLogged->can('show', $food)) {

            // se il food di cui si vuole fare la show appartiene all'utente loggato
                $category = Category::where("id", $food->category_id )->first();
                return view("admin.foods.show", compact("food", "category"));

        } else {

            // se il food di cui si vuole fare la show NON appartiene all'utente loggato
                abort(403, "Non sei autorizzato a questa azione");
        }
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
       
        // determino utente loggato
        $userLogged = Auth::user();

        $food = Food::where('slug', $slug)->first();

        if ($userLogged->can('edit', $food)) {

            // se il food di cui si vuole fare l'edit appartiene all'utente loggato
                $categories = Category::all();
                return view("admin.foods.edit", compact("food", "categories"));

        } else {

            // se il food di cui si vuole fare l'edit' NON appartiene all'utente loggato
                abort(403, "Non sei autorizzato a questa azione");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidationFood $request, Food $food)
    {
        // determino utente loggato
        $userLogged = Auth::user();

        if ($userLogged->can('update', $food)) {

            // se il food di cui si vuole fare l'upgrate appartiene all'utente loggato

                $data = $request->all();

                if($food->image){
                    Storage::delete($food->image);
                }
        
                if(isset($data["img"])){
                    $data["image"] = Storage::put("foods_image", $data["img"]); 
        
                }else{
                    $data["image"] = null;
                }

                // creo slug univoco, nel caso in cui il nuovo è già presente nel database ne creo uno diverso, concatenandolo ad un couter
                // Prova-nuovo-food 
                // Prova-nuovo-food-1
                $slug = Str::slug($data['name']);

                //solo se il nuovo slug è diverso da quello che c'era prima ne crei uno nuovo diverso da quelli presenti sul database
                if($food->slug != $slug){ 
                    $counter = 1;
                    while (Food::where('slug', $slug)->first()) {
                        $slug = Str::slug($data['name']) . '-' . $counter;
                        $counter++;
                    }    
                    $data['slug'] = $slug;
                }

                $food->update($data);
                $food->save();

                return redirect()->route("admin.foods.index");

          } else {

            // se il food di cui si vuole fare l'upgrade NON appartiene all'utente loggato
                abort(403, "Non sei autorizzato a questa azione");
          }


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->route("admin.foods.index")
        ->with('success','Portata cancellata con successo!');;
    }
}