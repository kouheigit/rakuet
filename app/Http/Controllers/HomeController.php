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
	    $age = DB::table($user)->select('age')->get();
        return view('home',compact('age'));
    }
    public function homes(Request $request)
    {       
	    $users = Auth::user()->email;
            $moji1=$users;
            $moji1 = str_replace('@','',$moji1);
	    $moji2 = str_replace('.','',$moji1);
	    $user = $moji2;
            $users =  DB::table($user)->where('id',1)->first();	    
              
	     return view('home.home2',compact('users')); 
    }
    public function home2(Request $request)
    {	  
            return redirect('home');
    }
    public function home2post(Request $request)
    {
	    $users = Auth::user()->email;
            $moji1=$users;
            $moji1 = str_replace('@','',$moji1);
            $moji2 = str_replace('.','',$moji1);
            $user = $moji2;
            $age = $request->input('age');
            $heavy = $request->input('heavy');
            $tall = $request->input('tall');
	    $sexual = $request->input('sexual');

	    if(!is_null($age)){
		    DB::table($user)->where('id',1)->update(['age'=>$age]);
	     }
	   if(!is_null($heavy)){
                    DB::table($user)->where('id',1)->update(['weight'=>$heavy]);
	   }    
           if(!is_null($tall)){
                    DB::table($user)->where('id',1)->update(['height'=>$tall]);
	   }
	   if(!is_null($sexual)){
                    DB::table($user)->where('id',1)->update(['sexual'=>$sexual]);
             }
	    return redirect('home2'); 
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
