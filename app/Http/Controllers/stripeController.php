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
            //plan2で入れたpaidのsession関数を入れる
	    session_start();
            $paid = null; 
            $paid = $_SESSION['paid'];
	    if($paid == 1){

		//planから来た場合のみストライプページを表示する

		$_SESSION['paid'] = null;

		
	      $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
	      $user = $moji2;

	     //有料プランに加入しているかどうか?  
                $pass = DB::table($user)->where('id','1')->value('paid');                
		return view('stripe.stripe',compact('pass'));
	    }else{
		//外部ページからのアクセスを制限する
		return back();
	    }
	}
	//有料ページ、まだ何も手を加えていない
	public function paid(Request $request)
	{
	    $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
	      $user = $moji2;
	      
	      $pass = DB::table($user)->where('id','1')->value('paid');
	      
	      if($pass==null){
		      return back();
	      }
	      
		return view('stripe.paid',compact('pass'));
	}
	public function stripestart(Request $request)
	{
		return view('stripe.stripestart');
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
	    return redirect('paid');
	  //  return back();

          } catch (\Exception $ex) {
            return $ex->getMessage();
          }
	}
        
	//支払い済みユーザーかどうかを見分ける
	public function charge1(Request $request)
	{
	    $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
              $user = $moji2;

	      $pass = DB::table($user)->where('id','1')->value('paid');
	      
	      if($pass==!null){
		      return redirect('paid');
		}else{
		       return back();
	        }

	}
}
