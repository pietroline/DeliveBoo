<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationPayment;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentController(ValidationPayment $request)
    {

        // simulazione metodo pagamento
        if($request->paymentMethod == 2){
            // metodo di pagamento adesso con carta,

            // data di oggi
            $today = Carbon::now();

            // carta valida al pagamento 4242 4242 4242 4242 con cvv 354
            if($request->cardNumber == 4242424242424242){
                if($request->cvv == 354){
                    if($request->expirationYear >= $today->year){
                        if($request->expirationMonth >= $today->month){

                            $return = true;

                        }else{
                            $return = false;
                        } 
                    }else{
                        $return = false;
                    }
                  
                }else{
                    $return = false;
                }
            }else{
                $return = false;
            }
        }else{
            
            $return = true;

        }

        if($return){
            // metodo di pagamento alla consegna
            $this->storePayment($request);

            return response()->json(
                [
                    "success" => true,
                ]
            );
        }else{
            return response()->json(
                [
                    "success" => false,
                ]
            );
        }


       
    }

    // storePayment si occupa di salvare le informazioni dell'ordine accettato nel DB
    private function storePayment($request){

        $data = $request->all();
        $data["order_confirmed_date"] = Carbon::now();

        $order = new Order();
        $order->fill($data);

        $order->save();
    }
}
