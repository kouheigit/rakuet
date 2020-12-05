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
	//支払いページ
	public function index(Request $request)
	{
            //plan2で入れたpaidのsession関数を入れる
	    session_start();
            $paid = null; 
            $paid = $_SESSION['paid'];
	    if($paid == 1){

		//planから来た場合のみストライプページを表示する
		$_SESSION['paid'] = null;

	      //user情報を取得する
	      $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
	      $user = $moji2;

	     //有料プランに加入しているかどうか?  
	      $pass = DB::table($user)->where('id','1')->value('paid');

	      //planから呼び出す
	       
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

	      $pass = null;  
	      $plan = null;
              
	      session_start();  
	      //session関数でpaidauthを取得する
	      if (empty($_SESSION['paidauth'])) {
		      return back();
	      }
	  
	      
	      //有料プランに加入していない場合はアクセス出来ないようにする【承認済】
	      $pass = DB::table($user)->where('id','1')->value('paid');
	      
	      if($pass==null){
		      return back();
	      }

	      //planが決まっている場合はアクセス出来ないようにする【承認済】
	      $plan = DB::table($user)->where('id','1')->value('plan');
	      if($plan==!null){
		      return back();
	      }
	      
	      
	      //特定ページ以外はたどり着けなくする
	      $_SESSION['paidauth'] = null;

	      $plans = DB::table('plan')->get();


	      return view('stripe.paid',compact('pass','plans'));

	}
        //このページはテストです。
	public function stripestart(Request $request)
	{
		//新たに作るresult（新）に追加する
		//下記の機能は新resulutにも追加する
		session_start();
		if (empty($_SESSION['paidauth'])) {
                      return back();
		}

                $_SESSION['paidauth'] = null;
		return view('stripe.stripestart');
	}
        //post
	public function charge(Request $request)
	{
	    $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
	      $user = $moji2;

	      //認証用テストコード
              session_start();
              $paidauth = $request->input('paidauth');
              $_SESSION['paidauth'] = $paidauth;

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
        
	//post 支払い済みユーザーかどうかを見分ける
	public function charge1(Request $request)
	{
	    $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
	      $user = $moji2;
              
	      //認証用テストコード
	      session_start();
	      $paidauth = $request->input('paidauth');
	      $_SESSION['paidauth'] = $paidauth;

              //登録していないユーザーは弾く
	      $pass = DB::table($user)->where('id','1')->value('paid');
	      
	      if($pass==!null){
		      return redirect('paid');
		}else{
		       return back();
	        }

	}
        //post 支払い済みユーザーかどうかを見分ける
	public function chargeauth(Request $request)
	{
		$paidauth = $request->input('paidauth');
		session_start();
		$_SESSION['paidauth'] = $paidauth;
		//問題点、resultページは全く同じものをつくりstripeだけ別の物を使用する
		//resultchargeを作成した後にページ遷移させる
		return redirect('stripestart');		
	}
}
