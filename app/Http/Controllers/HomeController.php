<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        return view('home');
    }
    public function homes(Request $request)
    {
	    $change = $request->input('change');
	   // $dell = $request->input('dell');

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
}
