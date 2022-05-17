<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// rotta per tutti i ristoranti
Route::get("/restaurants", "Api\RestaurantController@index");

// rotta per ristorante singolo, dettagli del ristorante e menu ristorante
Route::get("/restaurants/{slug}", "Api\RestaurantController@show");

// rotta per tutte le tipologie di ristorante
Route::get("/typologies", "Api\TypologyController@index");

// rotta per ristoranti filtrati
Route::get("/restaurant/{filter}", "Api\RestaurantController@filter");

// rotta per conferma ordine
Route::post("/payment", "Api\PaymentController@paymentController");
