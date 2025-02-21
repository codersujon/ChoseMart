<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){
         $data = Product::orderBy('created_at', 'desc')->get();
        return view("LandingPage.Pages.Home",["data"=>$data]);
    }
    public function showProduct($id){
        $data = Product::find($id);
        return view("LandingPage.Pages.ProductDetailsPage",["data"=>$data]);
    }
   
    /**
     * Summary of CheckoutPage
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function CheckoutPage(){
        try {
            // Get the user's token from the session
            $token = Session::get('user_token');
            
            // Fetch cart items associated with the user's token
            $cartItems = ProductCart::with('product')->where('user_token', $token)->get();
            
            // Calculate total amount
            $totalAmount = 0 ;
            foreach ($cartItems as $cartItem) {
                $totalAmount += $cartItem->price * $cartItem->qty; 
            }
        
            return view("LandingPage.Pages.Checkout", ["data" => $cartItems, "totalAmount" => $totalAmount]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
