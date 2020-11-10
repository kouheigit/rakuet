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
	      // $keys = ['家','研究室','外出','学内','長期不在','test'];
	      //パイグラフから棒グラフにする
	      $keys = [];
	      // $weight = DB::table($user)->where('id','>',1)->whereNotNull('weight')->orderBy('day')->get();
	      $weight = DB::table($user)->where('id','>',1)->whereNotNull('weight')->limit(10)->orderBy('day','desc')->get();
	      $counts = [];
	      foreach($weight as $weights){
		      $beforekeys[] = $weights->day;
		      $beforecounts[] = $weights->weight;
	      }
　　　　　　　//配列を反転する
	      $keys = array_reverse($beforekeys);
	      $counts = array_reverse($beforecounts);
              //weightのlimit部分は改良の余地有り
	      //postのsession関数で値を受け取って値を表示するchart.jsのプログラムを書く
	    return view('graph.graph1',compact('keys','counts'));
    }
}
