<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    //


    public function dashboard()
    {
        return view('frontend.accounts.dashboard',[
            'user'=>Auth::user()
        ]);
    }
}
