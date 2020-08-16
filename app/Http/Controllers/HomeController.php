<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
	    $user = Auth::user()->email;//user情報の取り出しemailの読み込み(重要)
	   
        return view('home',compact('user'));
    }
    public function homes(Request $request)
    {
	    $change = $request->input('change');

	    return redirect('home2');
	    /* if(!empty($start)){
              $moji1=$start;
              $moji1 = str_replace('@','',$moji1);
	      $moji2 = str_replace('.','',$moji1);
	      $maketable = $start;
	      session_start();
	      $_SESSION['member'] = $maketable;
	     }*/
	    
            //テーブルを作成するメソッド
	    /*
	    if(!empty($start)){
	      $moji1=$start;
	      $moji1 = str_replace('@','',$moji1);//文字を除外
	      $moji2 = str_replace('.','',$moji1);//文字を除外
	      $create = "create table $moji2(id int, name varchar(10), col varchar(10))";
	      $make =$create;
	      $createtable = DB::statement($make);
	      //テーブルを削除するメソット
	    }else if(!empty($dell)){
	       $moji1=$dell;
               $moji1 = str_replace('@','',$moji1);
	       $moji2 = str_replace('.','',$moji1);
	       $dell1 = "drop table $moji2";
	       $delltable = DB::statement($dell1);
	    }*/
                   
		   // return view('home.home2'); 
    }
    public function home2(Request $request)
    {
	    /*
	    session_start();
	    $member =  $_SESSION['member'];
	    $syamu = DB::table('users')
		    ->where('email','like', '%' .$member . '%')->get();
	    return view('home.home2',compact('syamu'));*/
	    return view('home.home2');
    }
    public function home2p(Request $request)
    {
        // $dell = $request->input('dell');
	 return redirect("homedell");
	 
    }
    public function homedell(Request $request)
    {
	    return view('home.homedell');
    }
    public function dellmember(Request $request)
    {
	    $dell = $request->input('dell');
	    DB::table('users')->where('email',$request->dell)->delete();
	    $moji1=$dell;
            $moji1 = str_replace('@','',$moji1);
            $moji2 = str_replace('.','',$moji1);
            $dell1 = "drop table $moji2";
            $delltable = DB::statement($dell1);
	    return redirect('index');
    }
}
