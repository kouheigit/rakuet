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
	      $beforekeys = [];
	      $beforecounts = [];

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
      //graph1以外からgraph1にアクセス出来なくする(アクセスチェック)
            session_start();
	    $graphswitch = $_SESSION['graphswitch'];
	    
	   if($graphswitch == 'ON'){
	   }else{
	      return redirect('home');	   
	   }	
                //アクセスチェック終了

	    
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
	      
	      //アクセスチェックのためにnullに戻す 
	      $_SESSION['graphswitch'] = null;

	      return view('graph.graph1',compact('keys','counts'));
    }

         public function graphpost(Request $request)
	 {
		 $graphswitch = $request->input('graphswitch');
		 $returns = $request->input('returns');
		 $gopie = $request->input('gopie');
		 

		 if($returns==!null){
			 return redirect('graph');
		 }

		 if($gopie==!null){
			 return redirect('graphpie');
	         }
		 
		 session_start();
		 $_SESSION['graphswitch'] = $graphswitch;
		 
		 
		 //↓ ユーザー情報を呼び出す
               $users = Auth::user()->email;
                 $moji1=$users;
                 $moji1 = str_replace('@','',$moji1);
                 $moji2 = str_replace('.','',$moji1);
		 $user = $moji2;

		 $now = $request->input('graphatai');

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
       public function graphpie(Request $request)
       {
	      //sintyoku.php
	      $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
	      $user = $moji2;

	      $name = Auth::user()->name;
              
	      //アクセスチェック
	      session_start();
              $_SESSION['graphatai'] = null;
	       
              //plan=nullの場合はgraph2に渡す
            $plan = DB::table($user)->where('id','1')->value('plan');
            if($plan == null){
                    return redirect('graph2');
	    }
           
	   $all = DB::table($user)->where('id','>',1)->get()->count();//目標の数(全体の総数)
	   $jikkoubi = DB::table($user)->where('id','>',1)->where('jiki',0)->get()->count();//実績
	   //達成値の計算 
	   $tassei = $jikkoubi / $all * 100;
	   $tasseiti = floor($tassei);
	   //未実行率
	   $mijikko = 100 - $tasseiti;
	   	   
	   $keys = ['実行率(%)','未実行(%)'];
	   $counts =[$tasseiti,$mijikko];
            
	    //ダイエット開始時の体重です
	    $beforeweight =  DB::table($user)->where('id','1')->value('weight');
          
	    $weightinfo = DB::table($user)->whereNotNull('weight')->max('day');
	    //↓【重要】取得したIDを元に最後に入力された体重を所得
	    $nowweight = DB::table($user)->where('day',$weightinfo)->value('weight');
	    
	   $ans = $beforeweight - $nowweight;
	    //ダイエット開始時より減量した体重数
	   if($ans > 0){
		   $genryo = "ダイエット開始時より$ans kg減量に成功
しています。";
	    }elseif($ans == 0){
                   $genryo = null;
	    }else{
	           $ans1 = -$ans;
	           $genryo = "【注意】ダイエット開始時より$ans1 kg体重が増加しています";
	     }
	    
               
	    return view('graph.graphpie',compact('name','tasseiti','keys','counts','mijikko','nowweight','beforeweight','genryo'));
       }
   
       public function graph2(Request $request)
       {
	       return view('graph.graph2');
       }
    
}
