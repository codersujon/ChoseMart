<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class OrderListController extends Controller
{
     public function orderList(){
      $orders = Invoice::where('status', '!=', 'cancelled')
      ->orderBy("created_at", "desc")
      ->with('invoice_products')
      ->get();

  return view("AdminSite.Pages.OrderList", ["data" => $orders]);
     }
}
