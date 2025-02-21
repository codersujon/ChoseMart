<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        return view("LandingPage.Pages.Login");
    }

    /**
     * Summary of Resistration
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Resistration(){
        return view("LandingPage.Pages.Resistration");
    }
    
    public function ConfirmOrder(){
        return view("LandingPage.Pages.OrderConfirm");
    }

    public function register(Request $request)
    {
        try {
            $this->validateRegistration($request);
            $this->createUser($request);
            return redirect()->route('allUser')->with('success', 'Registration successful. Please log in.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            
            return redirect()->back()->with('error', 'An error occurred during registration.');
        }
    }

    protected function validateRegistration(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'mobile'=>'required',
            'address'=> 'required',
        ]);
    }

    protected function createUser(Request $request)
    {
        return User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile'=>$request->input('mobile'),
            'address'=> $request->input('address'),
            'password' => Hash::make($request->input('password')),
        ]);
    }

    public function AllUser(){
       $user = User::all();
       return view('AdminSite.Pages.AllUser', compact('user'));
    }
    
}
