<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class diaryController extends Controller
{
	public function index(Request $request)
	{
	      $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
	      $user = $moji2;
	    /*テストコード	      
	      $plus = 1;
	        $today = date("Y.m.d",strtotime("$plus day"));
	      テストコード終了*/
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
	           
	      $record =  DB::table($user)->orderBy('day','desc')->where('id','>',1)->get();
	      return view('diary.diary',compact('record','daystart'));
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
	        $weightinfo = DB::table($user)->whereNotNull('weight')->max('id');
		 //【重要】取得したIDを元に最後に入力された体重を取得と精製
		$weightinfo1 = DB::table($user)->where('id',$weightinfo)->get('weight');
		$nowweight = preg_replace('/[^0-9]/', '',$weightinfo1);

                //目標体重の取得と精製
		$targetDB = DB::table($user)->where('id','1')->get('target');
		$target = preg_replace('/[^0-9]/', '',$targetDB);

		//【重要】ダイエットを始めた際の体重の取得
		$beforeDB = DB::table($user)->where('id','1')->get('beforeweight');
		//データの精製
		$beforeweight = preg_replace('/[^0-9]/', '',$beforeDB);

		if($target > $nowweight||$target==$nowweight)
		{ 
			$result1 = $beforeweight - $nowweight;
			$result = "ダイエット成功です!!!目標体重$target kgを下回りました。
				  合計$result1 kg痩せられました、ダイエット成功おめでとうございます";
		}elseif($beforweight > $nowweight){
			$result1 = $beforeweight - $nowweight;
			$result = "減量に成功しました、現在の体重は$nowweightで$beforeweightから
				　 $result1　kgの減量に成功しました。";
		}elseif($nowweight > $beforeweight){
			$result1 = $nowweight - $beforeweight;
			$result = "ダイエット失敗です、現在の体重は$nowweight kgで
				ダイエット開始前よりも体重が$result1 kg増加しています
                                もう一度別のプランを考えてみたり、食生活を見直してダイエットを
				やり直してみましょう";
		}else{
			$result="体重の変化はありませんでした、(文を考える)";
                }
	//※　ダイエット成功の場合の処理

		//beforeweightよりweightの方が軽い時の処理
		//beforeweightから(beforeweight-weight)kgやせましたと表記する

	//更に目標体重をしたまわった場合は↓
		//最新のweightがtargetと同じまたはtargetを下回った場合は減量目標体重
		//を達成しましたとの表記をする


	//※　ダイエット失敗の場合
		//beforeweightより増量した場合
		//beforeweightよりweightの方が重い場合はダイエット失敗として処理をする
		
		//↑　以上の3パターンの文章を用意しておく
		return view('diary.diaryresult',compact('test'));
	}
	        	
}
