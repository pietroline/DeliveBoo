<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware("auth")
    ->namespace("Admin")
    ->name("admin.")
    ->prefix("admin")
    ->group(function(){
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('/foods', 'FoodController');
        Route::get('restaurants/orders', 'OrderController@index')->name("orders");
        Route::get('restaurants/charts', 'ChartController@index')->name("charts");
        Route::resource('/restaurants', 'RestaurantController');
        
    });


//---Inizio Braintree ---// 

// Rotta GET per la pagina di checkout
Route::get('/payment/checkout', function () {

    //genero oggetto gateway con i parametri del mio account Braintree presi da env
    $gateway = new Braintree\Gateway([
      'environment' => config('services.braintree.environment'),
      'merchantId' => config('services.braintree.merchantId'),
      'publicKey' => config('services.braintree.publicKey'),
      'privateKey' => config('services.braintree.privateKey')
    ]);
  
    $token = $gateway->ClientToken()->generate();
  
    return response()->json($token);
  })->name("checkout");


// Rotta POST per la domanda di conferma pagamento e reindirizzamento pagina di successo
Route::post('/payment/checkout', function (Request $request) {

    $gateway = new Braintree\Gateway([
      'environment' => config('services.braintree.environment'),
      'merchantId' => config('services.braintree.merchantId'),
      'publicKey' => config('services.braintree.publicKey'),
      'privateKey' => config('services.braintree.privateKey')
    ]);
  
  
    $total = $request->total;
    $nonce = $request->payment_method_nonce;
    $name = $request->name;
    $phone = $request->phone;
  
    $result = $gateway->transaction()->sale([
      'amount' => $total,
      'paymentMethodNonce' => $nonce,
      'customer' => [
        'firstName' => $name,
        'phone' => $phone,
      ],
      'options' => [
        'submitForSettlement' => true
      ]
    ]);
  
    if ($result->success) {

      $transaction = $result->transaction;
      return response()->json($transaction->id);

    } else {

      $errorString = "";
      foreach ($result->errors->deepAll() as $error) {
        $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
      }
      return response()->json($result->message);
      
    }
  });

//---fine Braintree ---// 



Route::get("{any?}", function(){
    return view("guest.home");
})->where("any", ".*");
