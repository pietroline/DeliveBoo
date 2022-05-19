<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
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
        $data["orderInfo"] = json_encode($data["cart"]);

        $data["order_confirmed_date"] = Carbon::now();

        $order = new Order();
        $order->fill($data);

        $order->save();

        // email
        $lead = new Lead();
        $lead->fill($data);
        $lead->save();
        Mail::to("ordine@" . $data["restaurant_slug"] . ".it")->send(new SendMail($lead));

        return response()->json(
            [
                "success" => true,
            ]
        );
        

    }

}
