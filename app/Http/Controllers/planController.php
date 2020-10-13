<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
date_default_timezone_set('Asia/Tokyo');

class planController extends Controller
{
	public function index(Request $request)
	{
	//データ・ベースで調べてボディデータがなければ分岐させる
        //分岐はifブレード分岐でさせる
		//データベースのplanカラムを調べてplan番号がない場合はif文で分岐させる
	    $imgnomal = [7,13,14,16,17,18,19];
            $img = null;
	    $users = Auth::user()->email;
            $moji1=$users;
            $moji1 = str_replace('@','',$moji1);
            $moji2 = str_replace('.','',$moji1);
            $user = $moji2;
	    $users =  DB::table($user)->where('id',1)->first();
	    $plan = $users->plan;
                
	        // if文はdaystartが２の場合（ダイエット期間が終了している場合)

                $dayDB = DB::table($user)->where('id','1')->get('daystart');
                $daystart = preg_replace('/[^0-9]/', '', $dayDB);
                if($daystart=="2")
                {
			return redirect("diaryresult");

		}elseif($daystart=="3"){
                        //daystartが３の場合はプラン変更をしないので
			//plancontinueへ移行させる 
			return redirect("plancontinue");
		}

	    if($plan==null){  //プランが決まってない時の処理

		    $weight = $users->weight;

		    return view('plan.plan',compact('users','weight'));

	    }else{ //プランが決まっている時の処理

	            $plans =  DB::table('plan')->where('id',$plan)->first();
	            $title = $plans->title;
	            $text  = $plans->text;
	     if (in_array($plan, $imgnomal)){
                        $img = 1;
                }

                if($plan == 15){
                        $img = 15;
                }elseif($plan == 20){
                        $img = 20;
                }elseif($plan == 21){
                        $img = 21;
                }elseif($plan == 22){
                        $img = 22;
                }

	     return view('plan.plan',compact('img','users','title','text'));
	     }
	} 
	public function plan(Request $request)//routeのplan1にあたる
	{
		$period = $request->input('period');
		$weight = $request->input('hev');
		session_start();
		$_SESSION['period'] = $period;//これは回して使用する
		$_SESSION['weight'] = $weight;//これは回して使用する
		$_SESSION['error'] = null;
		$_SESSION['error1'] = null;
		$_SESSION['error2'] = null;
		$_SESSION['error3'] = null;
		//user情報を取得する
	        $users = Auth::user()->email;
                $moji1=$users;
                $moji1 = str_replace('@','',$moji1);
                $moji2 = str_replace('.','',$moji1);
		$user = $moji2;
                $users =  DB::table($user)->where('id',1)->first();
		$beforeweight = $users->weight;
		$_SESSION['beforeweight'] = $beforeweight;
		$genryo = $beforeweight - $weight;
	        $_SESSION['genryo'] = $genryo;

	switch($period)
	{
		case"14":
			$periods="2週間";
			break;

		case"30":
			$periods="1ヶ月";
			break;

		case"60":
			$periods="2ヶ月";
			break;
		case"90":
			$periods="3ヶ月";
			break;
		case"120":
			$periods="4ヶ月";
			break;
		case"150":
			$periods="5ヶ月";
			break;
		case"180":
			$periods="6ヶ月";
			break;

	}
           if($beforeweight == $weight){
                $_SESSION['error'] = '目標体重が変わっていません';
		return redirect('error');
	   }elseif($periods=="2週間"&&$genryo > 5){
		   $_SESSION['error1'] ='2週間で5キロ以上の減量計画は体に過度の負担をかけますの減量をする体重を減らして下さい';
                   return redirect('error');
	   }elseif($periods=="1ヶ月"&& $genryo > 10){
		   $_SESSION['error2'] ='1ヶ月で10キロ以上の減量計画は体に過度の負担をかけますので減量をする体重を減らして下さい';
		   return redirect('error');
           }elseif($periods=="2ヶ月"&& $genryo > 15){
		   $_SESSION['error3'] ='2ヶ月で15キロ以上の減量計画は体に
過度の負担をかけますので減量をする体重を減らして下さい';
		   return redirect('error');
	   }
	   $daystart = DB::table($user)->where('id','1')->value('daystart');
         
          if($daystart=="3")
	  {
		  $_SESSION['periods'] = $periods;
		  return redirect('plancontinue1');
	  }	  
		return view('plan.plan1',compact('beforeweight','weight','periods','genryo'));
	}
        public function error(Request $request)
	{
		session_start();
		$error = $_SESSION['error'];
		$error1 = $_SESSION['error1'];
		$error2 = $_SESSION['error2'];
		$error3 = $_SESSION['error3'];
		return view('plan.error',compact('error','error1','error2','error3'));
	}
	public function error1(Request $request)
	{
	 $return = $request->input('return');

	   if($return=='1'){
		   session_start();
		   $_SESSION['error'] = null;
                   $_SESSION['error1'] = null;
		   $_SESSION['error2'] = null;
		   $_SESSION['error3'] = null;
                   return redirect('plan');
	   } 

	}
        public function plan2(Request $request)
	{
		$atai = $request->input('atai');
		return view('plan.plan2');
	}
	public function plan2post(Request $request)
	{
		$atai = $request->input('atai');
		$atai1= $request->input('atai1');
		if($atai=='0'){
		return redirect('plan3');
		}else{
		return redirect('plan4');
		}

	}
	public function plan3(Request $request)
	{
		return view('plan.plan3');
	}
	public function plan3post(Request $request)
	{
		$atai = $request->input('atai');
		$atai1 = $request->input('atai1');
		$atai2 = $request->input('atai2');
		if($atai=='0'){
			return redirect('plannoswim');
		}elseif($atai1=='1'){
			return redirect('planlittlehard');
		}elseif($atai2=='2'){
			return redirect('plan2');
		}
	}
	public function plannoswim(Request $request)
	{
		return view('plan.plannoswim');
	}
	public function plannoswimpost(Request $request)
	{
		$atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
		if($atai=='0'){
			//実装済みDB1ダイエット水泳療法
			session_start();
			$_SESSION['usedb'] = "1";
                        return redirect('result');
                }elseif($atai1=='1'){
                        return redirect('plannocommute');
                }elseif($atai2=='2'){
                        return redirect('plan3');
                }

        }
	public function plannocommute(Request $request)
	{
		return view('plan.plannocommute');
	}
	public function plannocommutepost(Request $request)
	{
		$atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
                if($atai=='0'){
                        return redirect('plannocycle');
		}elseif($atai1=='1'){
                        return redirect('plannostation');
                }elseif($atai2=='2'){
                        return redirect('plannoswim');
                }


	}
	public function plannocycle(Request $request)
	{
		return view('plan.plannocycle');
	}
	public function plannocyclepost(Request $request)
        {  
                $atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
		if($atai=='0'){
			//実装済ダイエットDB3自転車通勤
			session_start();
			$_SESSION['usedb'] = "3";
                        return redirect('result');
		}elseif($atai1=='1'){
			//実装済ダイエットDB6体脂肪減少ダイエット
			session_start();
			$_SESSION['usedb'] = "6";
                        return redirect('result');
		}elseif($atai2=='2'){
                        return redirect('plannocommute');
		}

	}
	public function plannostation(Request $request)
	{
		return view('plan.plannostation');
	}
        public function plannostationpost(Request $request)
	{
		$atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
                if($atai=='0'){
			session_start();
			//実装済夜間ウォーキングダイエット
			$_SESSION['usedb'] ="2";
                        return redirect('result');
		}elseif($atai1=='1'){
			//実装済体脂肪減少ダイエット
                        session_start();
                        $_SESSION['usedb'] = "6";
                        return redirect('result');
                }elseif($atai2=='2'){
                        return redirect('plannocommute');
                }

	}
	public function planlittlehard(Request $request)
	{
		return view('plan.planlittlehard');
	}
	public function planlittlehardpost(Request $request)
        {
                $atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
		if($atai=='0'){
			return redirect('plannodanjiki');
                }elseif($atai1=='1'){
                        return redirect('plannosport');
                }elseif($atai2=='2'){
			return redirect('plan3');
                }

	}
	public function plannodanjiki(Request $reques)
	{
		return view('plan.plannodanjiki');
	}
	public function plannodanjikipost(Request $request)
        {
                $atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
                if($atai=='0'){
			//実装済週1断食DB5
			session_start();
                        $_SESSION['usedb'] = "5";
                        return redirect('result');
                }elseif($atai1=='1'){
                        return redirect('plannoprotein');
                }elseif($atai2=='2'){
                        return redirect('planlittlehard');
                }

        }

	public function plannoprotein(Request $request)
	{
		return view('plan.plannoprotein');
	}
        public function plannoproteinpost(Request $request)
	{
		$atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
                if($atai=='0'){
			//実装済プロテイン+低カロリーDB11
			session_start();
                        $_SESSION['usedb'] = "11";
                        return redirect('result');
		}elseif($atai1=='1'){
			//実装済VLCDダイエットDB4
			session_start();
			$_SESSION['usedb'] = "4";
                        return redirect('result');
                }elseif($atai2=='2'){
                        return redirect('planlittlehard');
                }

	}
	public function plannosport(Request $request)
	{
		return view('plan.plannosport');
	}
	public function plannosportpost(Request $request)
	{
		$atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
                if($atai=='0'){
			//実装済食事改善+下半身筋トレDB7
			session_start();
                        $_SESSION['usedb'] = "6";
                        return redirect('result');
                }elseif($atai1=='1'){
                        return redirect('planlittleeat');
		}elseif($atai2=='2'){
                        return redirect('planlittlehard');
                }

	}
	public function planlittleeat(Request $request)
	{
		return view('plan.planlittleeat');
	}
	public function planlittleeatpost(Request $request)
        {
                $atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
                if($atai=='0'){
                        return redirect('plannonote');
                }elseif($atai1=='1'){
			//実装済VLCDダイエット(DB8)
			session_start();
                        $_SESSION['usedb'] = "8";
                        return redirect('result');
                }elseif($atai2=='2'){
                        return redirect('plannosport');
                }
        }


	public function plannonote(Request $request)
	{
		return view('plan.plannonote');
	}
	public function plannonotepost(Request $request)
	{
		 $atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
                if($atai=='0'){
			//実装済レコーディング・ダイエット(DB12)
			session_start();
                        $_SESSION['usedb'] = "12";
                        return redirect('result');
		}elseif($atai1=='1'){
			//実装済糖質少食ダイエット法DB22
			session_start();
			$_SESSION['usedb'] = "22";
                        return redirect('result');
                }elseif($atai2=='2'){
                        return redirect('planlittleeat');
                } 
	}
        //【ここから先は間食は可能システムのコントローラー】
	public function plan4(Request $request)
        {
                return view('plan.plan4');
	}
	public function plan4post(Request $request)
        {
                 $atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
		if($atai=='0'){
                        return redirect('planyesswim');
		}elseif($atai1=='1'){
                        return redirect('planyeslittelhard');
                }elseif($atai2=='2'){
                        return redirect('plan2');
                }
	}
	public function planyesswim(Request $request)
	{
		return view('plan.planyesswim');
	}
	public function planyesswimpost(Request $request)
        {
                $atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
                if($atai=='0'){
			//実装済DB13水泳療法+分食法
			session_start();
                        $_SESSION['usedb'] = "13";
                        return redirect('result');
                }elseif($atai1=='1'){
                        return redirect('planyescommute');
                }elseif($atai2=='2'){
                        return redirect('plan4');
                }
	}
	public function planyescommute(Request $request)
	{
		return view('plan.planyescommute');
	}
	public function planyescommutepost(Request $request)
	{
		$atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
                if($atai=='0'){
			//実装済DB14通勤療法+分食療法
			session_start();
                        $_SESSION['usedb'] = "14";
                        return redirect('result');
                }elseif($atai1=='1'){
                        return redirect('planwalkstation');
		}elseif($atai2=='2'){
                        return redirect('planyesswim');
                }

	}
	public function planwalkstation(Request $request)
	{
		return view('plan.planwalkstation');
	}
	public function planwalkstationpost(Request $request)
        {
                $atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
                if($atai=='0'){
			//実装済DB16夜間ウォーキング+分食法
			session_start();
                        $_SESSION['usedb'] = "16";
                        return redirect('result');
                }elseif($atai1=='1'){
			//実装済　DB21下半身筋トレ+分食法
			session_start();
			$_SESSION['usedb'] = "21";
                        return redirect('result');
                }elseif($atai2=='2'){
                        return redirect('planyescommute');
                }
	}
	public function planyeslittelhard(Request $request)
	{
		return view('plan.planyeslittelhard');
	}
	public function planyeslittelhardpost(Request $request)
	{
		$atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
                if($atai=='0'){
                        return redirect('planoneday');
                }elseif($atai1=='1'){
                        return redirect('planyeslittleeat');
                }elseif($atai2=='2'){
                        return redirect('plan4');
                }
	}
	public function planoneday(Request $request)
	{
		return view('plan.planoneday');
	}
	public function planonedaypost(Request $request)
        {
                $atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
		if($atai=='0'){
	//実装DB7週1断食ダイエット+分食ダイエット
			session_start();
			$_SESSION['usedb'] = "7";
                        return redirect('result');
                }elseif($atai1=='1'){
                        return redirect('planyesprotein');
                }elseif($atai2=='2'){
                        return redirect('planyeslittelhard');
                }
	}
	public function planyesprotein(Request $request)
	{
		return view('plan.planyesprotein');
	}
	public function planyesproteinpost(Request $request)
        {
                $atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
                if($atai=='0'){
			//実装済DB15週1プロテインダイエット+分食ダイエット
			session_start();
                        $_SESSION['usedb'] = "15";
                        return redirect('result');
                }elseif($atai1=='1'){
                        return redirect('planyesnote');
                }elseif($atai2=='2'){
                        return redirect('planoneday');
                }
	}
	public function planyesnote(Request $request)
	{
		return view('plan.planyesnote');
	}
	public function planyesnotepost(Request $request)
        {
                $atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
                if($atai=='0'){
	                //実装DB19週1レコーディングダイエット+分食ダイエット
	                session_start();
                        $_SESSION['usedb'] = "19";
                        return redirect('result');
		}elseif($atai1=='1'){
			//実装DB18分食+小分食ダイエット
			session_start();
                        $_SESSION['usedb'] ="18";
                        return redirect('result');
                }elseif($atai2=='2'){
                        return redirect('planyesprotein');
                }
	}
	public function planyeslittleeat(Request $request)
	{
		return view('plan.planyeslittleeat');
	}
	public function planyeslittleeatpost(Request $request)
	{
		$atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
		if($atai=='0'){
			//分食+小分食ダイエット
			session_start();
                        $_SESSION['usedb'] = "18";
                        return redirect('result');
                }elseif($atai1=='1'){
                        return redirect('planafternoon');
                }elseif($atai2=='2'){
                        return redirect('planyeslittelhard');
                }

	}
	public function planafternoon(Request $request)
	{
		return view('plan.planafternoon');
	}
	public function planafternoonpost(Request $request)
	{
		$atai = $request->input('atai');
                $atai1 = $request->input('atai1');
                $atai2 = $request->input('atai2');
                if($atai=='0'){
			//実装済DB20ビーマルワン+食事分食ダイエット
			session_start();
                        $_SESSION['usedb'] = "20";
                        return redirect('result');
                }elseif($atai1=='1'){
			//実装済DB17食事分割ダイエットノーマルver
			session_start();
                        $_SESSION['usedb'] = "17";
                        return redirect('result');
                }elseif($atai2=='2'){
                        return redirect('planyeslittleeat');
                }

	}
	public function result(Request $request)
	{
		session_start();
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

		return view('plan.result',compact('beforeweight','genryo','period','weight','plandb','plandb1','afterday','today','img'));
	}

	public function resultpost(Request $request)
	{
	     //user情報の取得
		$users = Auth::user()->email;
                $moji1=$users;
                $moji1 = str_replace('@','',$moji1);
                $moji2 = str_replace('.','',$moji1);
		$user = $moji2;	

	    //プラン番号の取得
		$yes = $request->input('yes');
	    //日付の取得
                $today = date("Y.m.d");
		if($yes == 1){
	           session_start();
		   $period =  $_SESSION['period'];
		   $endday = date("Y.m.d",strtotime("$period day"));

		 //ダイエット開始するキー  
                 DB::table($user)->where('id',1)->update(['daystart'=>'875']);
                //ダイエット終了日
		 DB::table($user)->where('id',1)->update(['endday'=>$endday]);

		 //開始日をid,1のdayカラムに入れる
                 DB::table($user)->where('id',1)->update(['day'=>$today]);

                //現在の体重
		   $beforeweight = $_SESSION['beforeweight'];
		   DB::table($user)->where('id',1)->update(['beforeweight'=>$beforeweight]);

		//減量目標減量目標に入れる		   
		   $target = $_SESSION['weight'];  
		   DB::table($user)->where('id',1)->update(['target'=>$target]);

		//プラン番号DB1に入力
		   $plan = $_SESSION['usedb'];
		   DB::table($user)->where('id',1)->update(['plan'=>$plan]);

		//現在の体重と現在の日付を新たなカラムに入れる
		   DB::table($user)->insert(['weight'=>$beforeweight,'day'=>$today]);
		}
		return redirect('plan');

	}
	
	//postはplan1へ【planと同じpost】へ飛ばす
	public function plancontinue(Request $request){

	      $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
              $user = $moji2;
              $weight =  DB::table($user)->where('id','1')->value('weight');
	      return view('plan.plancontinue',compact('weight'));
	}
	public function plancontinue1(Request $request)
	{
		session_start();
		$beforeweight = $_SESSION['beforeweight'];
		$periods = $_SESSION['periods'];
		$weight = $_SESSION['weight'];
		$genryo = $_SESSION['genryo'];

		return view('plan.plancontinue1',compact('beforeweight','periods','weight','genryo'));
		
	}
	public function plancontinue1post(Request $request)
	{
	      //user情報呼び出し
	      $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
              $user = $moji2;

	      session_start();
	      $period =  $_SESSION['period'];
	      //ダイエット終了期間を割り出す。
              $endday = date("Y.m.d",strtotime("$period day"));

                 //ダイエット開始するキー  
                 DB::table($user)->where('id',1)->update(['daystart'=>'85']);
                //ダイエット終了日
                 DB::table($user)->where('id',1)->update(['endday'=>$enday]);

                 //開始日をid,1のdayカラムに入れる
                 DB::table($user)->where('id',1)->update(['day'=>$today]);

                //現在の体重
                   $beforeweight = $_SESSION['beforeweight'];
                   DB::table($user)->where('id',1)->update(['beforeweigh'=>$beforeweight]);

                //減量目標に入れる                 
                   $target = $_SESSION['weight'];
                   DB::table($user)->where('id',1)->update(['target'=>$trget]);

	        //現在の体重と現在の日付を新たなカラムに入れる
                  DB::table($user)->insert(['weight'=>$beforeweight,'day'=>$today]); 


	}
	
}
