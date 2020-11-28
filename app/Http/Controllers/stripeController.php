<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Stripe\Customer;
use Stripe\Stripe;
use Stripe\Charge;
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
	    $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
	      $user = $moji2;

	 try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => 100,
		'currency' => 'jpy'
	    ));
            DB::table($user)->where('id','1')->update(['paid'=>1]);
	    return back();

          } catch (\Exception $ex) {
            return $ex->getMessage();
        }
	}
}
