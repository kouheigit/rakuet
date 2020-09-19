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
			//未実装水泳療法DB1
                        return redirect('plan4');
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
		       //未実装
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
                        //未実装DB3自転車通勤療法
                        return redirect('plan4');
                }elseif($atai1=='1'){
                       //未実装DB6体脂肪減少ダイエット
                        return redirect('plan4');
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
                        //未実装DB2夜間ウォーキング;
                        return redirect('plan4');
                }elseif($atai1=='1'){
                       //未実装食事改善+下半身筋トレダイエット
                        return redirect('plan4');
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
                        //未実装週1断食DB5
                        return redirect('plan4');
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
                        //未実装プロテイン+低カロリーDB11
                        return redirect('plan4');
		}elseif($atai1=='1'){
			//未実装VLCDダイエットDB4
                        return redirect('plannoprotein');
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
                        //未実装食事改善+下半身筋トレDB7
                        return redirect('plan4');
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
                        //未実装
                        return redirect('plannonote');
                }elseif($atai1=='1'){
                        //未実装VLCDダイエット(DB8)
                        return redirect('plan4');
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
                        //未実装レコーディング・ダイエット(DB12)
                        return redirect('plan4');
		}elseif($atai1=='1'){
			//未実装少食ダイエット法DB13
                        return redirect('planl4');
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
			//未実装
                        return redirect('plan4');
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
                        //未実装DB13水泳療法+分食法
                        return redirect('plan4');
                }elseif($atai1=='1'){
                        return redirect('planyescommute');
                }elseif($atai2=='2'){
                        return redirect('plan2');
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
                        //未実装DB14通勤療法+分食療法
                        return redirect('plan4');
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
                        //未実装DB16夜間ウォーキング+分食法
                        return redirect('plan4');
                }elseif($atai1=='1'){
                        //未実装DB21下半身筋トレ+分食法
                        return redirect('plan4');
                }elseif($atai2=='2'){
                        return redirect('planyescommute');
                }
        }
	public function result(Request $request)
	{
		return view('plan.result');
	}
}
