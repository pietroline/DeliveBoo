<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentController()
    {

        return response()->json(
            [
                "success" => true,
                
            ]
        );
    }
}
