<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
date_default_timezone_set('Asia/Tokyo');

class graphController extends Controller
{
    public function index(Request $request)
    {
	     //外部からgraph1にアクセスすると値がそのまま残る問題(graphpost)
	    
	     //↓ ユーザー情報を呼び出す
	    $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
	      $user = $moji2;

	      //plan=nullの場合はgraph2に渡す
            $plan = DB::table($user)->where('id','1')->value('plan');
            if($plan == null){
                    return redirect('graph2');
            }
              
	      session_start();
	      $_SESSION['graphatai'] = null;
	  
	      $weight = DB::table($user)->where('id','>',1)->whereNotNull('weight')->limit(10)->orderBy('day','desc')->get();

	      $counts = [];
	      $keys = [];
	      foreach($weight as $weights){
		      $beforekeys[] = $weights->day;
		      $beforecounts[] = $weights->weight;
		      
	      }


	      //配列を反転する
	      $keys = array_reverse($beforekeys);
	      $counts = array_reverse($beforecounts);
	      //weightのlimit部分は改良の余地有り
	      ////postのsession関数で値を受け取って値を表示するchart.jsのプログラムを書く
	      return view('graph.graph1',compact('keys','counts'));
    }

    public function graph1(Request $request)
    {
	   
	    //↓ ユーザー情報を呼び出す
	    $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
	      $user = $moji2;

	      $plan = DB::table($user)->where('id','1')->value('plan');
	      if($plan == null){
		      return redirect('graph2');
	      }

	   
              session_start();
	      $skipnumber = $_SESSION['graphatai'];//次のプログラムで必ず使う$_SESSION関数にする

	      //↓ 次のプログラムで必ず使用する--start--
	     $before =  DB::table($user)->where('id','>',1)->whereNotNull('weight')->skip($skipnumber)->limit(10)->orderBy('day','desc')->get()->count();
	      $newcountnumber = intval($before);
	      
	      if($newcountnumber==10){

	      }else{
		    while(1){
                       $skipnumber = $skipnumber -1;
		       $before =  DB::table($user)->where('id','>',1)->whereNotNull('weight')->skip($skipnumber)->limit(10)->orderBy('day','desc')->get()->count();
		       $newcountnumber = intval($before);
		       if($newcountnumber==10){
			       break;
		       }
		    }
	    }
	      // -----ここまで------------
	      $weight = DB::table($user)->where('id','>',1)->whereNotNull('weight')->skip($skipnumber)->limit(10)->orderBy('day','desc')->get();//次のプログラムで必ず使う
	      
	      $counts = [];
	      $keys = [];
	      foreach($weight as $weights){
		      $beforekeys[] = $weights->day;
		      $beforecounts[] = $weights->weight;
		      
	      }


	      //配列を反転する
	      $keys = array_reverse($beforekeys);
	      $counts = array_reverse($beforecounts);

	         
	      return view('graph.graph1',compact('keys','counts'));
    }

         public function graphpost(Request $request)
	 {
		 //↓ ユーザー情報を呼び出す
               $users = Auth::user()->email;
                 $moji1=$users;
                 $moji1 = str_replace('@','',$moji1);
                 $moji2 = str_replace('.','',$moji1);
		 $user = $moji2;

		 $now = $request->input('graphatai');

		 session_start();
		 $before = $_SESSION['graphatai'];
		 $_SESSION['graphatai'] = $before + $now;
		 $graphatai = $_SESSION['graphatai'];
                 
		 //体重記録のある日記記録の総数を取る　
		 $all = DB::table($user)->where('id','>',1)->whereNotNull('weight')->orderBy('day','desc')->get()->count();
                 $allcount = intval($all);
                 
		 if($allcount < 10){
                        return redirect('graph');
		  }elseif($graphatai < 0 || $graphatai == 0){
		        $_SESSION['graphatai'] = 0;
			return redirect('graph');
		 }elseif($graphatai > $allcount){
			 $_SESSION['graphatai'] = $allcount;
			 return redirect('graph1');
		 }else{	 
		        return redirect('graph1');
		 }
		
	 }
   
       public function graph2(Request $request)
       {
	       return view('graph.graph2');
       }
    
}
