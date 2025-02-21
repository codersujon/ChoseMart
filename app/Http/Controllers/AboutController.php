<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $about = AboutUs::all();
      
      return view("LandingPage.Pages.about",["data"=> $about]);
    }

    
}
