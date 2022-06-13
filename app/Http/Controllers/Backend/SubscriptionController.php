<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
    public function index()
    {

        return view('backend.payments.index');
    }

    public function create()
    {

        return view('backend.payments.create');
    }

}
