<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//test↓
use Carbon\Carbon;
date_default_timezone_set('Asia/Tokyo');
//テストコード45行目
class diaryController extends Controller
{
	public function index(Request $request)
	{
	      $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
	      $user = $moji2;
	     
	    // 本日の体重を記録する
	      $today = date("Y.m.d");
	      //体重記録開始キーを読み込む
	      $dayDB = DB::table($user)->where('id',1)->get('daystart');
	      //dayDBから数字だけ取り出す
	      $daystart = preg_replace('/[^0-9]/', '', $dayDB);
	      //日付を呼び出す
	      $today1 = DB::table($user)->where('day',$today)->get();
	          if($today1=="[]"){
		           $today1 = null;
		  }
	      //今日の日付がない場合と体重記録キーがある場合は読みこむ 
	         if($today1==null&&$daystart=="875"){
		     DB::table($user)->insert(['day'=>$today]);
		 }
 

	      //楽エットに来る日付が空いた際に空いた分のdiaryを挿入する
	      $forday = 0;
	       while(1){
		      //DBに入ってるダイエット始めの日を探り出す
		    $startday = DB::table($user)->where('id',1)->value('day');     
		    $day = date("Y.m.d",strtotime("$forday day"));
		    $forday -=1;
		    $pastday = DB::table($user)->where('day',$day)->value('day');
                 if($pastday==null&&$daystart=="875"){

			 DB::table($user)->insert(['day'=>$day]);

	         }elseif($pastday==$startday){
			    break;
		 }		    
	      }
	      //ダイエット終了日以降の過剰な日付を削除する
	       $endday = DB::table($user)->where('id',1)->value('endday');
	        if($endday==null){
		      //何もしない
		 }else{
                  $nowday = DB::table($user)->where('day',$endday)->value('day');
                  $delete = DB::table($user)->where('day','>',$endday)->delete();
		}

	        if($endday==!null&&$today > $endday){
                   DB::table($user)->where('id','1')->update(['daystart'=>"2"]);
		}
                
		//経過日
		if($daystart==875&&$startday==!null&&$endday==!null){
                   $start = str_replace('.', '-',$startday);
                   $todays = str_replace('.', '-',$today);
		   $progress = (strtotime($todays) - strtotime($start))/(3600*24)+1;
		   $progress .='日';
	 	 }elseif($daystart==null){
		      $progress =null;
		 }elseif($today > $endday){
                      $progress ="終了";
                 }
              //DBにあるすべてのdiaryカラムを取り出している
	      $record =  DB::table($user)->orderBy('day','desc')->where('id','>',1)->get();
	      return view('diary.diary',compact('record','daystart','startday','endday','progress'));
	}
	public function indexpost(Request $request)
	{
		$theday = $request->input('theday');

		session_start();
		$_SESSION['theday'] = $theday;

		return redirect('diaryadd');
	}
	public function day1(Request $request)
	{
		session_start();
		$theday = $_SESSION['theday'];

		return view('diary.diaryadd',compact('theday'));
	}
        public function day1post(Request $request)
	{
	      //user情報の呼び出し
	       $users = Auth::user()->email;
               $moji1=$users;
               $moji1 = str_replace('@','',$moji1);
               $moji2 = str_replace('.','',$moji1);
	       $user = $moji2;

	       $day = $request->input('day');
	       $jiki = $request->input('jiki');
	       $heavy = $request->input('heavy');

	       if($jiki == "null"){
                     $jiki = null;
               }

	       if($jiki==null&&$heavy==null){
		       return redirect('diary');
	       }elseif($jiki==null){
		       DB::table($user)->where('day',$day)->update(['weight'=>$heavy]);
		       return redirect('diary');
	       }elseif($heavy==null){
		       DB::table($user)->where('day',$day)->update(['jiki'=>$jiki]);
		       return redirect('diary');
	       }else{
		       DB::table($user)->where('day',$day)->update(['weight'=>$heavy,'jiki'=>$jiki]);
		       return redirect('diary');
	       }
	}
	public function diaryresult(Request $request)
	{
	       //user情報の呼び出し
	       $users = Auth::user()->email;
               $moji1=$users;
               $moji1 = str_replace('@','',$moji1);
               $moji2 = str_replace('.','',$moji1);
	       $user = $moji2;

	        //現在の体重の情報を呼び出す【重要】体重が入力されたいちばん最後のIDを取得する	
	        //現在の体重取得
	       $weightinfo = DB::table($user)->whereNotNull('weight')->max('day');

		 //↓【重要】取得したIDを元に最後に入力された体重を取得【session関数に保存する】
	        $nowweight = DB::table($user)->where('day',$weightinfo)->value('weight');



                //目標体重の取得
		$target = DB::table($user)->where('id','1')->value('target');



		//【重要】ダイエットを始めた際の体重の取得
		$beforeweight = DB::table($user)->where('id','1')->value('beforeweight');
		 
		/*後で復活させる*/
		if($nowweight==$beforeweight){
			$result ="体重の変化はありませんでした、もう一度ダイエットプランを考え直して見たり
                                食生活を見直してダイエットをやり直して見ましょう";

		}elseif($target > $nowweight||$target==$nowweight){ 
			$result1 = $beforeweight - $nowweight;
			$result = "ダイエット成功です!!!目標体重$target kgを下回りました。
				 現在の体重は$nowweight kgで今回のダイエットでダイエット前体重の$beforeweight kgから合計$result1 kg痩せられました、ダイエット成功おめでとうございます";
		}elseif($beforeweight > $nowweight){
			$result1 = $beforeweight - $nowweight;
			$result = "減量に成功しました、現在の体重は$nowweight kgでダイエット前体重の$beforeweight kgから
				$result1 kgの減量に成功しました。";
		}elseif($nowweight > $beforeweight){
			$result1 = $nowweight - $beforeweight;
			$result = "ダイエット失敗です、現在の体重は$nowweight kgで
				ダイエット開始前よりも体重が$result1 kg増加しています
                                もう一度別のプランを考えてみたり、食生活を見直してダイエットを
				やり直してみましょう";
		}else{
			$result="体重の変化はありませんでした、もう一度ダイエットプランを考え直して見たり
				食生活を見直してダイエットをやり直して見ましょう";
	}
                      
		 return view('diary.diaryresult',compact('target','nowweight','result'));
	}

        public function diaryresultpost(Request $request)
	{
	      //user情報の呼び出し
               $users = Auth::user()->email;
               $moji1=$users;
               $moji1 = str_replace('@','',$moji1);
               $moji2 = str_replace('.','',$moji1);
	       $user = $moji2;
            //継続するかどうかの処理
	       $continue1 = $request->input('continue1');
	       $continue2 = $request->input('continue2');
               
	    //体重の更新
              $weightinfo = DB::table($user)->whereNotNull('weight')->max('day');
                //↓【重要】取得したIDを元に最後に入力された体重を取得
	      $nowweight = DB::table($user)->where('day',$weightinfo)->value('weight');
	       //↓　現在の最新の体重をweightカラムのid,1に挿入する
	       DB::table($user)->where('id',1)->update(['weight'=>$nowweight]);
             //【共通リセット項目】
               //↓　beforeweight（開始前体重)はリセットする
                  DB::table($user)->where('id',1)->update(['beforeweight'=>null]);
               //↓ endday（ダイエット終了日)もリセットする
                  DB::table($user)->where('id',1)->update(['endday'=>null]);
	      //target（目標体重)もリセットする
                  DB::table($user)->where('id',1)->update(['target'=>null]);
              //day（後で挙動をチェックする）もリセットする
		  DB::table($user)->where('id',1)->update(['day'=>null]);

		  //↓　id1以外のdiary削除機能
		  DB::table($user)->where('id','>',1)->delete();
               
	       //現在のダイエットを継続する場合↓
	       //if文で分岐させる
	       if($continue1 =="0"){
		//プランを継続する場合はdaystartカラムを3にする
		   DB::table($user)->where('id',1)->update(['daystart'=>"3"]);
                 //daystartが３の場合はplancontinueしか起動しない
		   return redirect('plancontinue');
	       }elseif($continue2 =="1"){     
                 //planもリセットする
		   DB::table($user)->where('id',1)->update(['plan'=>null]);
               //終了日もリセットしておく
                   DB::table($user)->where('id',1)->update(['endday'=>null]);
	       //daystartもリセットをしておく
                   DB::table($user)->where('id',1)->update(['daystart'=>null]);        
	       }
	     return redirect('home');	  
        }		
}
