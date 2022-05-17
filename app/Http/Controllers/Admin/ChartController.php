<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // prendo tutti gli ordini
        $orders = Order::where("restaurant_id", Auth::id())->get();
        

        // se request->year è false, ad esempio la prima volta che viene aperta la pagina charts,
        // setta il valore di default 2022
        if($request->year){
            $yearSelected = $request->year;
        }else{
            $yearSelected = 2022;
        }
        
    
        
        // definisco mesi dell'anno e variabile che conterrà i totali del mese
        $month = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];
        $money = [0,0,0,0,0,0,0,0,0,0,0,0];
        $arrayYear = []; // array contenente tutti gli anni in cui sono presenti ordini del ristorante


        //ciclo gli ordini e sommo i totali per mese
        foreach($orders as $order){
         
            $date = $order["order_confirmed_date"];
            $year = Carbon::parse($date)->format('Y');

            // verifico se year è presente nell'array degli anni, nel caso manchi lo inserisco
            if(!in_array($year, $arrayYear)){
                $arrayYear[] = $year;
            }
            
            if($year == $yearSelected){
                $moneyMonth = Carbon::parse($date)->format('m');
            
                switch ($moneyMonth){
                    case 1: 
                        $money[0] += $order["total"]; 
                        break;
                    case 2: 
                        $money[1] += $order["total"];
                        break;
                    case 3: 
                        $money[2] += $order["total"];
                        break;
                    case 4: 
                        $money[3] += $order["total"];
                        break;
                    case 5: 
                        $money[4] += $order["total"];
                        break;
                    case 6: 
                        $money[5] += $order["total"];
                        break;
                    case 7: 
                        $money[6] += $order["total"];
                        break;
                    case 8: 
                        $money[7] += $order["total"];
                        break;
                    case 9: 
                        $money[8] += $order["total"];
                        break;
                    case 10: 
                        $money[9] += $order["total"];
                        break;
                    case 11: 
                        $money[10] += $order["total"];
                        break;
                    case 12: 
                        $money[11] += $order["total"];
                        break;
                }
            }
            
        }


        return view("admin.charts.index", compact("month", "money", "yearSelected", "arrayYear"));
    }

}