<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderDetailsModel;
use App\Models\OrdersModel;

class orderdate extends Controller
{
    public function index()
    {
        
        $order = OrdersModel::all();
        $orderdetail = orderDetailsModel::all();
          $total = OrdersModel::sum('sub_total');

        return view('Pages.Orders_date.ordersdate', compact('order','orderdetail','total'));
    }

  

    public function get_today_order()
    {
        $order = OrdersModel::where('order_date', now()->day)->get();

        $totals = OrdersModel::where('order_date', now()->day)->sum('sub_total');
        return view('Pages.Orders_date.ordersbyday', compact('order','totals'));
    }
}
