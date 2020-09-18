<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class planController extends Controller
{
	public function index(Request $request)
	{
	//データ・ベースで調べてボディデータがなければ分岐させる
        //分岐はifブレード分岐でさせる
		//データベースのplanカラムを調べてplan番号がない場合はif文で分岐させる
	    $users = Auth::user()->email;
            $moji1=$users;
            $moji1 = str_replace('@','',$moji1);
            $moji2 = str_replace('.','',$moji1);
            $user = $moji2;
	    $users =  DB::table($user)->where('id',1)->first();
	    $weight = $users->weight;
	    return view('plan.plan',compact('users','weight'));
	}
	public function plan(Request $request)
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
		$genryo = $beforeweight - $weight;

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
	public function plan4(Request $request)
        {
                return view('plan.plan4');
        }

	public function result(Request $request)
	{
		return view('plan.result');
	}
}
