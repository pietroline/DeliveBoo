<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationOrdersFilter;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        

        if(count($request->all()) == 0){
            $filter = "DESC";
            $column = "order_confirmed_date";

            $selected = 1;
        }else{

            $selected = $request->filter;

            switch ($request->filter){
                case 1:
                    $filter = "DESC";
                    $column = "order_confirmed_date";
                    break;
                case 2:
                    $filter = "ASC";
                    $column = "order_confirmed_date";
                    break;
                case 3:
                    $filter = "DESC";
                    $column = "name";
                    break;
                case 4:
                    $filter = "ASC";
                    $column = "name";
                    break;
                case 5:
                    $filter = "DESC";
                    $column = "total";
                    break;
                case 6:
                    $filter = "ASC";
                    $column = "total";
                    break;
                default:
                    $filter = "DESC";
                    $column = "order_confirmed_date";
            }

        }

        $orders = Order::where("restaurant_id", Auth::id())->orderBy($column, $filter)->get();

        return view("admin.orders.index", compact("orders", "selected"));
        
    }
}