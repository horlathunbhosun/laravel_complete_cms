<?php

namespace App\Services;

class Paystack
{
    const base_url = 'https://api.paystack.co/';

    public static function transactionInitialize($total_cost, $email, $meta_data){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => self::base_url."transaction/initialize",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'amount' => $total_cost * 100,
                'currency'=> 'USD',
                'email' => $email,
                'metadata' => $meta_data,
                'channels' => ['card']
            ]),
            CURLOPT_HTTPHEADER => [
                "authorization: Bearer " . env('PAYSTACK_SECRET_KEY'),
                "content-type: application/json",
                "cache-control: no-cache"
            ],
        ));

        $response = curl_exec($curl);
        $err      = curl_error($curl);
        if($err){
            return false;
        }
        return $response;
    }

    public static function transactionUrl($amount, $email, $meta ){
        $response = self::transactionInitialize($amount, $email, $meta);

        if ($response == false) {

            return ['message' => 'An error occurred', 'url' => ''];
        }

        $tranx = json_decode($response);

        if ($tranx->status != 1) {
            return ['message' => $tranx->message, 'url' => ''];
        }

        return ['message' => $tranx->message, 'url' => $tranx->data->authorization_url];
    }

    public static function transactionWebhook($reference){
        $curl      = curl_init();
        if (!$reference) {
            return response()->json(['message'=>'No Reference Supplied'],400);
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => self::base_url."transaction/verify/" . rawurlencode($reference),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Bearer " . env('PAYSTACK_SECRET_KEY'),
                "cache-control: no-cache"
            ],
        ));

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        if ($err) {
            return response()->json(['message'=>'Failed Transaction'],400);
        }
        return $response;
    }

}
