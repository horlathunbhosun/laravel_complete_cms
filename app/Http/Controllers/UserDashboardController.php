<?php

namespace App\Http\Controllers;

use App\Book;

use Illuminate\Http\Request;
use App\SubscriptionTransactions;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    //


    public function dashboard()
    {
        $subscription_history = SubscriptionTransactions::where('user_id',Auth::id())->get();
        $books = Book::all();
        return view('frontend.accounts.dashboard',[
            'user'=>Auth::user(),
            'payments' => $subscription_history,
            'books' => $books
        ]);
    }



}
