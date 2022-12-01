<?php

namespace App\Http\Controllers;

use App\SubscriptionTransactions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    //


    public function dashboard()
    {
        $subscription_history = SubscriptionTransactions::where('user_id',Auth::id())->get();
        return view('frontend.accounts.dashboard',[
            'user'=>Auth::user(),
            'payments' => $subscription_history
        ]);
    }



}
