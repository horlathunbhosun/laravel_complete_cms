<?php

namespace App\Http\Controllers;


use App\PaymentPlan;
use App\Services\Paystack;
use App\SubscriptionTransactions;
use App\User;
use App\WalletCoin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubscriptionPaymentController extends Controller
{
    //

    public function store(Request $request){


        $payment = PaymentPlan::where('id', $request->plan_id)->first();
        if($payment){
            $user = User::find(Auth::id());

//            dd($payment);
//            $amount = $this->getAmount($request->country, $request->academic_type);
//            switch ($amount){
//                case 50000:
//                    $vat = 850;
//                    break;
//                case 40000:
//                    $vat = 700;
//                    break;
//                default:
//                    $vat = 850;
//            }

//            $total_amount = $amount + $vat;

            $transaction_reference = 'KANALREADS'.$this->randomString(10).now()->timestamp;


            $payments = new SubscriptionTransactions();
            $payments->user_id = Auth::id();
            $payments->payment_status = 'pending';
            $payments->amount = $payment->amount_usd;
            $payments->transaction_reference = $transaction_reference;
            $payments->description = 'Subscription fee for data one' ;
            $payments->save();



            $meta_data = [
                'transaction_reference' => $transaction_reference,
                'ref_c' => $payment->id,
                'email'=>$user->email,
                'user_ref' => $payments->user_id
            ];

            $data = Paystack::transactionUrl($payment->amount_usd,$user->email,$meta_data);
            $notification = array(
                'message' => $data['message'],
                'alert-type' => 'error'
            );
            return redirect($data['url'])->with($notification);
        }
        $notification = array(
            'message' => 'invalid Transaction',
            'alert-type' => 'error'
        );
        return back()->with($notification);

    }


    public function callback(Request $request){
        $response = Paystack::transactionWebhook($request->reference);
        $tranx = json_decode($response);
        $payment_transaction = SubscriptionTransactions::where('transaction_reference', $tranx->data->metadata->transaction_reference)->first();
        if(!$payment_transaction){
            $notification = array(
                'message' => 'Invalid Transaction',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        if($payment_transaction->status === 'paid'){
            $notification = array(
                'message' => 'Value given for transaction already',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $payment_transaction->payment_status = 'paid';
        $payment_transaction->payment_date = date('Y-m-d');
        $payment_transaction->save();

        $payment_detail = PaymentPlan::where('id', $tranx->data->metadata->ref_c)->first();

        $data_wallet = new WalletCoin();
        $data_wallet->user_id = $tranx->data->metadata->user_ref;
        $data_wallet->coins = $payment_detail->coin_value;
        $data_wallet->bonus_coin = $payment_detail->bonus;
        $data_wallet->amount_paid = $payment_detail->amount_usd;
        $data_wallet->save();


        $notification = array(
            'message' => $tranx->message . ', Coin added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('user.dashboard')->with($notification);

    }


    private function randomString($length): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;

    }

}
