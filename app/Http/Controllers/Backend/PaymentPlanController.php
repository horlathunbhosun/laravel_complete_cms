<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\PaymentPlan;
use Illuminate\Http\Request;

class PaymentPlanController extends BackendController
{
    //

    public function index()
    {


        $payment_plans = PaymentPlan::paginate($this->limit);
        $paymentPlansCount = PaymentPlan::count();
        return view('backend.payments.index',compact('payment_plans', 'paymentPlansCount'));
    }

    public function create()
    {

        return view('backend.payments.create');
    }

    public function store(Request $request)
    {
        //

        $this->validate($request,[
            'amount_usd' => 'required',
            'amount_ngn' =>'required',
            'coin_value' => 'required',
        ]);

        $data = $request->only('amount_usd', 'amount_ngn','coin_value','bonus');

        $done = New PaymentPlan($data);
        $confirm = $done->save();
        if($confirm)
        {
            toastr()->success('Payment Plan Added Successfully', 'Success');
            return redirect('/backend/payment/plans');
        }
        toastr()->error('An error occurred while submitting', 'Error');
        return back();


    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }



    public function destroy($id)

    {


    }

}
