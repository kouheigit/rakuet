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
	    $users = Auth::user()->email;//user情報の取り出しemailの読み込み(重要)
	    $moji1=$users;
            $moji1 = str_replace('@','',$moji1);
            $moji2 = str_replace('.','',$moji1);
	    $user = $moji2; 
	    session_start();
	    $_SESSION['user'] = $user;

        return view('home',compact('user'));
    }
    public function homes(Request $request)
    {       /*
	    $users = Auth::user()->email;
            $moji1=$users;
            $moji1 = str_replace('@','',$moji1);
	    $moji2 = str_replace('.','',$moji1);
	    $user = $moji2;*/
/*
            session_start();
            $user = $_SESSION['user'];
	    $age = $request->input('age');
	    $heavy = $request->input('heavy');
	    $tall = $request->input('tall');
	    $sexual = $request->input('sexual');
           
	    DB::table($user)->insert($param);*/
	   //  return redirect('home2');       
	     return view('home.home2'); 
    }
    public function home2(Request $request)
    {	   
	    /*
	    session_start();
	    $member =  $_SESSION['member'];
	    $syamu = DB::table('users')
		    ->where('email','like', '%' .$member . '%')->get();
	    return view('home.home2',compact('syamu'));*/
	    // return redirect("homedell");
	    return view('home.home2');
    }
    public function home2p(Request $request)
    {
	    session_start();
            $user = $_SESSION['user'];
            $age = $request->input('age');
            $heavy = $request->input('heavy');
            $tall = $request->input('tall');
            $sexual = $request->input('sexual');
            $param = [
                        'weight'=> $request->heavy,
                        'height'=> $request->tall,
                ];
	    DB::table($user)->insert($param);
	    return redirect('home2'); 
	 /*削除用メソット後になって必要にある
	 $dell = $request->input('dell');
	 $age = $request->input('age');   
	 if(!empty($dell)){
		 return redirect("homedell");
	 }else{
		 //ここでデータ・ベースへの登録処理をする
		 //↓　下の奴はデータ・ベースへ値を入力したら消すか変える
		 return redirect("home");
	 } */
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
