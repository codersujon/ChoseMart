<?php

namespace App\Http\Controllers;

use App\Models\ShippingCharge;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function getShippingCharge(Request $request)
    {
        $location = $request->input('location');

        // Fetch the shipping charge based on the selected location
        $shippingCharge = ShippingCharge::where('location', $location)->value('price');

        return $shippingCharge;
    }
    
}
