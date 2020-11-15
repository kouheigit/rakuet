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
	      $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
              $user = $moji2;

	    $syamu = "これは成功です";
	    $syamu2 = ["900"];
	   // $syamu5  = DB::table($user)->where('id','>',1)->value('weight');

	    return view('graph.graph',compact('syamu','syamu2','syamu5'));
    }
    public function graph1(Request $request)
    {
	    //↓ 下のプログラムはすべてコピーする(現在テストコード未削除状態)
	    $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
	      $user = $moji2;
	      
	      $skipnumber = 10;//次のプログラムで必ず使う$_SESSION関数にする

	      //↓ 次のプログラムで必ず使用する--start--
	     $before =  DB::table($user)->where('id','>',1)->whereNotNull('weight')->skip($skipnumber)->limit(10)->orderBy('day','desc')->get()->count();
	      $newcountnumber = intval($before);
	      
	      if($newcountnumber==10){
		   $testcode ="これは10です";
	      }else{
		    while(1){
                       $skipnumber = $skipnumber -1;
		       $before =  DB::table($user)->where('id','>',1)->whereNotNull('weight')->skip($skipnumber)->limit(10)->orderBy('day','desc')->get()->count();
		       $testcode="10ではないです";
		       $newcountnumber = intval($before);
		       if($newcountnumber==10){
			       break;
		       }
		    }
	    }
	      // -----ここまで------------
	      $weight = DB::table($user)->where('id','>',1)->whereNotNull('weight')->skip($skipnumber)->limit(10)->orderBy('day','desc')->get();//次のプログラムで必ず使う
	     
     //※ → 後で復活させる　 $weight = DB::table($user)->where('id','>',1)->whereNotNull('weight')->limit(10)->orderBy('day','desc')->get();
	      $countnumber = 0;//testcode
	      $counts = [];
	      $keys = [];
	      foreach($weight as $weights){
		      $countnumber = $countnumber + 1; //testcode
		      $beforekeys[] = $weights->day;
		      $beforecounts[] = $weights->weight;
		      
	      }


	      //配列を反転する
	      $keys = array_reverse($beforekeys);
	      $counts = array_reverse($beforecounts);
	      //weightのlimit部分は改良の余地有り
	      ////postのsession関数で値を受け取って値を表示するchart.jsのプログラムを書く
	      return view('graph.graph1',compact('newcountnumber','keys','counts','countnumber','testcode'));
    }
}
