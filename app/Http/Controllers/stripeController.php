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
	//有料ページの一覧、まだ何も手を加えていない
	public function paid(Request $request)
	{
	    //ユーザー情報の取得
	    $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
	      $user = $moji2;

	      $pass = null;  
	      $plan = null;
              
	      session_start();  
	      //session関数でusedbを取得する
	      //paidauthが1ではなければ弾く
	      if (empty($_SESSION['paidauth'])) {
		      return back();
	      }elseif($_SESSION['paidauth']==!1){
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
	     public function striperesult(Request $request)
	     {
		
		session_start();
                
		if($_SESSION['angou']==null){
			$_SESSION['paidauth'] = null;
		        return back();
	
		}

		
		//プラン番号
		$imgnomal = [7,13,14,16,17,18,19];
                $img = null;
		$usedb = $_SESSION['usedb'];
		//DB呼び出し
		$plan1 = DB::table('plan')->where('id',$usedb)->first();
		//タイトル呼び出し
		$plandb = $plan1->title; 
		//本文呼び出し
		$plandb1 = $plan1->text;
		//減量目標体重とダイエット期間を呼び出す
		$genryo = $_SESSION['genryo'];//減量する体重量
                $period =  $_SESSION['period'];//ダイエット期間
		$weight =  $_SESSION['weight'];//減量目標予定の体重
		$beforeweight = $_SESSION['beforeweight'];//現在の体重
		$today = date("m月d日");
		$afterday = date("m月d日",strtotime("$period day"));//ダイエット終了の日程
		if (in_array($usedb, $imgnomal)){
		        $img = 1;	
		}

		if($usedb == 15){
			$img = 15;
		}elseif($usedb == 20){
			$img = 20;
		}elseif($usedb == 21){
			$img = 21;
		}elseif($usedb == 22){
			$img = 22;
		}
 
		//angouをnullにする
		$_SESSION['angou'] = null;

		return view('stripe.striperesult',compact('beforeweight','genryo','period','weight','plandb','plandb1','afterday','today','img'));
	}

	
	//このページは中間考査ページにする
	public function stripestart(Request $request)
	{
		//新たに作るresult（新）を作成する
		//paidから送られてくるpaidauthには3
		//paidauthが3のものは新リザルトへ送る
		//3の場合はpaidauthを4にして
		//angouに新しいパスを入れる
		
		//新リザルトから送られてくるものには4
		//新リザルトから送られて来たものはangouの他に
		//paidauthに1の値を入れてpaidへ送る

		session_start();
		if (empty($_SESSION['paidauth'])) {
                      return back();
		}
               //paidページから送られてきたもののみに暗号を付与する
	       if($_SESSION['paidauth']==3){
		       $_SESSION['paidauth'] = 4;
		        //暗号
		        $angou = random_bytes(10);
		       $_SESSION['angou'] = bin2hex($angou);
		       //striperesultへ送る
		       return redirect('striperesult');
		//striperesultから送られてきたら4から１に変える
		}elseif($_SESSION['paidauth']==4){
                       $_SESSION['paidauth']== 1;
		       return redirect('paid');
		}else{
			return back();
		}

              //  $paidauth =  $_SESSION['paidauth'];
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
		//ダイエットプランを記入する
		$usedb = $request->input('usedb');
		$paidauth = $request->input('paidauth');
		session_start();
		$_SESSION['usedb'] = $usedb;
		$_SESSION['paidauth'] = $paidauth;
		//問題点、resultページは全く同じものをつくりstripeだけ別の物を使用する
		//resultchargeを作成した後にページ遷移させる
		return redirect('stripestart');		
	}
}
