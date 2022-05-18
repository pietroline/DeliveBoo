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

        //salvo le informazioni dell'ordine accettato nel DB
        $data = $request->all();
        $data["order_confirmed_date"] = Carbon::now();

        $order = new Order();
        $order->fill($data);

        $order->save();

        return response()->json(
            [
                "success" => true,
            ]
        );
        

    }

}
