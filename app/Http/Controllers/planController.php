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
	    session_start();
	    $_SESSION['users'] = $users; 
	    $beforeweight = $_SESSION['error'];
	    return view('plan.plan',compact('users','weight','beforeweight'));
	}
	public function plan(Request $request)
	{
		$period = $request->input('period');
		$weight = $request->input('hev');
		session_start();
		$_SESSION['period'] = $period;
		$_SESSION['weight'] = $weight;
		$_SESSION['error'] = null;
                $users = $_SESSION['users'];
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
		return redirect('plan');
	   }elseif($periods=="2週間"&&$genryo > 5){
		   $_SESSION['error'] ='2週間で5キロ以上の減量は体に過度の負担をかけますので目標の減量値を減らして下さい';
                   return redirect('plan');
           }

		return view('plan.plan1',compact('weight','periods','genryo'));
	}
	public function result(Request $request)
	{
		return view('plan.result');
	}
}
