<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Srmklive\PayPal\Facades\PayPal;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalController extends Controller
{


    public function payment(){
        $department = Session::get('department');
        $plan = Session::get('plan');
        $price = Session::get('price');

        $data = [
            'items' => [
                [
                    'name' => 'Membership',
                    'price' => $price,
                    'qty' => 1,
                ]
            ],
            'invoice_id' => 1,
            'invoice_description' => "Gym membership at {$department->name} for $plan ",
            'return_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
            'total' => $price,
        ];



            $response = (new ExpressCheckout)->setExpressCheckout($data, true);

            return redirect($response['paypal_link']);

    }

    public function cancel(){
        dd('not done bbe');
    }


    //Callback method
    public function success(Request $request){

        $response =(new ExpressCheckout)->getExpressCheckoutDetails($request->token);
        if(in_array(strtoupper($response['ACK']),['SUCCESS','SUCCESSWITHWARNING'])){

            dd('done bbe');
        }

    }

}
