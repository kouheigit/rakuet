<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use StripeStripe;
use StripeCharge;


class stripeController extends Controller
{
	public function index(Request $request)
	{
		return view('stripe.stripe');
	}

	public function charge(Request $request)
	{
	 try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => 1000,
                'currency' => 'jpy'
 	     ));
	    return back();

          } catch (\Exception $ex) {
            return $ex->getMessage();
        }
	}
}
