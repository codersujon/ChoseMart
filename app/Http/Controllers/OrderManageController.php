<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class OrderManageController extends Controller
{
    public function ReturnOrder(){
        $returnOrders = Invoice::where('status', 'return')->get();
        return view('AdminSite.Pages.ReturnOrder',['data'=>$returnOrders]);
    }
    public function PendingOrder(){
        $returnOrders = Invoice::where('status', 'pending')->get();
        return view('AdminSite.Pages.PendingOrder',['data'=>$returnOrders]);
    }
    public function ProccesingOrder(){
        $returnOrders = Invoice::where('status', 'proccessing')->get();
        return view('AdminSite.Pages.ProccesingOrder',['data'=>$returnOrders]);
    }
    public function CencelOrder(){
        $returnOrders = Invoice::where('status', 'cancelled')->get();
        return view('AdminSite.Pages.CencelOrder',['data'=>$returnOrders]);
    }
    public function CompletedOrder(){
        $returnOrders = Invoice::where('status', 'completed')->get();
        return view('AdminSite.Pages.CompletedOrder',['data'=>$returnOrders]);
    }
    public function DelivaryOrder(){
        $returnOrders = Invoice::where('status', 'delivary')->get();
        return view('AdminSite.Pages.delivaryOrder',['data'=>$returnOrders]);
    }
}
