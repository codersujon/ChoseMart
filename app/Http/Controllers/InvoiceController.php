<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Exception;


class InvoiceController extends Controller
{
    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            // 'name' => 'required',
            'name' => 'required|min:1|max:50|regex: /^[a-zA-Z]{2,}(?: [a-zA-Z]+){0,2}$/',
            // 'mobile' => 'required',
            'mobile' => 'required|regex:/(01[3-9]\d{8})$/|not_regex:/[a-z]/',
            'address' => 'required',
            // 'address' => 'required|min:10|max:400',
            'location' => 'required|string',
        ]);

        if($validator->fails()){
            return response([
                "error"=>[
                    "message"=> "Validation error!",
                    "name"=> $validator->errors()->get('name'),
                    "mobile"=> $validator->errors()->get('mobile'),
                    "address"=> $validator->errors()->get('address'),
                    "location"=> $validator->errors()->get('location'),
                ]
            ], 422);
        }

        // if another request within 1 min
        if($freq_req = Cache::get($request->mobile)){
            return response([ 'error' => ['frequent_req' => $freq_req]], 500);
        }

        //try
        $code = (string)rand(1000,9999);
        $phone = '+88'.$request->mobile;
        Cache::add($code, $phone, 120);  //cache for 2 minutes

        $token  = "fb8cdf079e6d32adfac32946cb6b95b6070c1078";
        $mobile = $request->mobile;
        $sms_content = 'martexbangladesh.com এর অর্ডারটি কনর্ফাম করার জন্য আপনার ওটিপি হল: ' . $code;

        $msg=urlencode($sms_content);
        $url = 'https://sysadmin.muthobarta.com/api/v1/send-sms';

        $data = [
            'receiver' => $mobile,
            'message' => $sms_content,
            'remove_duplicate' => true,
        ];

        $response = Http::withHeaders(['Authorization' => 'Token fb8cdf079e6d32adfac32946cb6b95b6070c1078'])->post($url, $data);

        // Session Put All the Inputs
        Session::put([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'location' => $request->location
        ]);

        Cache::add($request->mobile,'Please wait 60 sec for another request.',60);
        $message = 'অর্ডারটি কনর্ফাম করার জন্য আপনার মোবাইলে ওটিপি পেরণ করা হয়েছে! ওটিপি দিয়ে অর্ডারটি কনর্ফাম করুন।';
        // $message = 'Verification code has been sent to your number';
        return response()->json(['response' => ['code_sent' => $message]], 200);
    }

    /**
     * Verify OTP
     */

    public function verifyOtp(Request $request){

        try{
            $phone = Cache::get($request->code);
            if($phone == null){
                $error_message = "যাচাইকরণ কোডটি সঠিক নয়, পূর্ণরায় চেষ্টা করুন!";
                // $error_message = "Verification code does not match or expired!";
                return response()->json([ 'error' => [ 'code_invalid' => $error_message,
                ]], 422);
            }
            $user = Session::pull($phone);
        } catch(Exception $e){
            $error_message = "Verification code does not match or expired!";
            return response()->json([ 'error' => [ 'code_invalid' => $error_message,]], 422);
        }


        try {

            if($phone != null){

                // Get cart items for the user (assuming each cart item has a product relationship)
                $cartItems = ProductCart::where('user_token', Session::get('user_token'))->with('product')->get();

                // Check if the cart is empty
                if ($cartItems->isEmpty()) {
                    return redirect()->route('home.index');
                }

                // Calculate the overall total price for all items in the cart
                $overallTotalPrice = $cartItems->sum(function ($cartItem) {
                    return $cartItem->qty * $cartItem->product->discount_price;
                });

                // Create an invoice with overall total price
                $invoice = Invoice::create([
                    'invoice_number' => uniqid(),
                    'name' => Session::get('name'),
                    'mobile' => Session::get('mobile'),
                    'address' => Session::get('address'),
                    'location' => Session::get('location'),
                    'total_price' => $overallTotalPrice,
                ]);

                // Add cart items to the invoice
                foreach ($cartItems as $cartItem) {
                    $product = $cartItem->product;

                    InvoiceProduct::create([
                        'invoice_id' => $invoice->id,
                        'product_id' => $product->id,
                        'qty' => $cartItem->qty,
                        'single_item_price' => $product->discount_price,
                        'total_price' => $cartItem->qty * $product->discount_price,
                        'size' => $cartItem->size,
                        'color' => $cartItem->color,
                    ]);
                }

                // Clear the user's cart after creating the invoice
                ProductCart::where('user_token', Session::get('user_token'))->delete();

                $reg_successful = 'আপনার অর্ডারটি সফলভাবে সম্পন্ন হয়েছে আমাদের কল সেন্টার থেকে ফোন করে আপনার অর্ডারটি কনফার্ম করা হবে!';
                return response()->json(
                ['response' => 
                    [
                        'reg_successful' => $reg_successful,
                        'data'=> $invoice
                    ]
                ], 200);

                // return response()->json(['response' => ['route' => route('order-confirm')]], 200);

            }

        } catch (ValidationException $e) {
                // Handle validation errors
                // return response()->json(['error' => $e->errors()], 422);
                return redirect()->back();
        } catch (\Exception $e) {
                // Handle other exceptions (log, notify, etc.)
                return response()->json(['error' => 'An error occurred while creating the invoice'], 500);
        }

    }

    public function updateStatus(Request $request, $id){
          $invoice = Invoice::findOrFail($id);
          $invoice->update(['status' => $request->input('status')]);

          return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function invoiceProduct($id){
        $singleInvoice = Invoice::find($id);
        $invoiceProduct = InvoiceProduct::where('invoice_id',$id)->with('invoice','product')->get();

        return view('AdminSite.Pages.invoiceProduct', ['invoice'=>$singleInvoice,'invoiceProduct'=>$invoiceProduct]);
    }
}
