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
	    //keysに日付、contents(実際はtestに入れる）に体重をいれる
	    //グラフは円グラフから棒グラフに変える(show_chart.jsをいじくる)
	    //wherenotnullのクエリを使う
	    $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
	      $user = $moji2;
	      $keys = ['家','研究室','外出','学内','長期不在','test'];
           
	      $test = DB::table($user)->where('id','>',1)->value('weight');
	     
            $counts = [20,4,3,2,1,$test];
	    return view('graph.graph1',compact('keys','counts','test'));
    }
}
