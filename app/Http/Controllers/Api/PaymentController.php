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

        // implementare controllo del pagamento


        // Se le logiche di controllo del pagamento sono ok, salvo le info nella tabella ordini e ritorno che il pagamento è andato a buon fine
        // $this->storePayment();
       $this->storePayment($request);

        return response()->json(
            [
                "success" => true,
                
            ]
        );
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
