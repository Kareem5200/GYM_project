<?php

namespace App\Http\Controllers;



use App\Models\Membership;
use Illuminate\Http\Request;
use Srmklive\PayPal\Facades\PayPal;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalController extends Controller
{


    public function payment(){

        $price = Session::get('price');

        $data = [
            'items' => [
                [
                    'name' => 'Membership',
                    'price' => $price,
                    'qty' => 1,
                ]
            ],
            'invoice_id' =>1 ,
            'invoice_description' => "Gym membership",
            'return_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
            'total' => $price,
        ];

            $response = (new ExpressCheckout)->setExpressCheckout($data, true);
            return redirect($response['paypal_link']);

    }

    public function cancel(){
        
        return redirect()->back()->with('paymentError',Lang::get('The payment process is canceled'));

    }


    //Callback method
    public function success(Request $request){

        $response =(new ExpressCheckout)->getExpressCheckoutDetails($request->token);
        if(in_array(strtoupper($response['ACK']),['SUCCESS','SUCCESSWITHWARNING'])){


            $end_date = date('Y-m-d',strtotime("+".Session::get('category'),strtotime(now()->toDateString())));

            Session::has('trainer_id') ? $trainer_id = Session::get('trainer_id'):$trainer_id = null;

            Membership::create([
                'user_id'=>auth()->id(),
                'department_id'=>Session::get('department_id'),
                'category_id'=>Session::get('category_id'),
                'trainer_id'=>$trainer_id,
                'start_date'=>now()->toDateString(),
                'end_date'=>$end_date,
            ]);

            Session::forget(['department_id','category_id','category','plan','price','trainer_id']);

            return to_route('memberships')->with('success',Lang::get('You have new membership'));
        }
        return redirect()->back()->with('paymentError',Lang::get('Error in payment process'));

    }

}
