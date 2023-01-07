<?php

namespace App\Http\Controllers;

use App\Book;
use App\Library;
use Illuminate\Http\Request;
use App\SubscriptionTransactions;
use App\WalletCoin;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    //


    public function dashboard()
    {
        $subscription_history = SubscriptionTransactions::where('user_id',Auth::id())->get();
        $books = Book::all();
        $walletCoins = WalletCoin::where('user_id', auth()->user()->id)->select('coins', 'bonus_coin')->get();
        $libraryBooks = Library::where('user_id', auth()->user()->id)->get();
        $libraryBookIds = [];
        foreach($libraryBooks as $libraryBook){
            $libraryBookId = $libraryBook->book_id;
            array_push($libraryBookIds, $libraryBookId);
        }
        $library = Book::whereIn('id', $libraryBookIds)->latest()->paginate(4);
        // dd($library);
        return view('frontend.accounts.dashboard',[
            'user'=>Auth::user(),
            'payments' => $subscription_history,
            'books' => $books,
            'walletCoins' => $walletCoins,
            'library' => $library
        ]);
    }



}
