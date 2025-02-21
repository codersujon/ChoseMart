<?php

namespace App\Http\Controllers;

use App\Models\ContactInformation;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = ContactInformation::all();
        return view("LandingPage.Pages.contactus", ['data'=>$contacts]);
    }

    public function submitForm(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
        $mobile = $request->input('mobile');
        $result = ContactUs::create(array('name'=>$name,'email'=>$email, 'mobile'=> $mobile, 'message'=>$message));
        if($result){
            return redirect()->back()->with('success','Thank You For Your Massege');
        }else{
            return redirect()->back()->with('error','somting went wrong ');
        }

    }
}
