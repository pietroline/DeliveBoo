<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentController()
    {

        // implementare controllo del pagamento


        // Se le logiche di controllo del pagamento sono ok, salvo le info nella tabella ordini e ritorno che il pagamento è andato a buon fine
        

        return response()->json(
            [
                "success" => true,
                
            ]
        );
    }
}
