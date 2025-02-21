<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function AllUser(){
        $users = User::all();
        return view("AdminSite.Pages.AllUser",compact("users"));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('allUser')->with('success', 'User deleted successfully');
    }
}
