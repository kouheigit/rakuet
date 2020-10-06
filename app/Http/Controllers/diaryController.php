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
	      $plus = 4;
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
	        	
}
