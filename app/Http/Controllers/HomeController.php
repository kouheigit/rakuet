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
	    $name = Auth::user()->name;
	    $moji1=$users;
            $moji1 = str_replace('@','',$moji1);
            $moji2 = str_replace('.','',$moji1);
	    $user = $moji2; 
	    $atai = DB::table($user)->where('id','1')->first();
	    $age = $atai->age;
	    $sexual =$atai->sexual;
	    $height =$atai->height;
	    //体重はdiaryから最新のデータを取ってくる
	    //$ataiとは違うクエリを作り下の文も適宜変更する
	    $weight =$atai->weight;
	    
	    //BMIの計算
	    if(!is_null($height)&&!is_null($weight))
	    {
	       $height1 = $height/100;
	       $height2 = $height1 * $height1;
	       $kei = $weight / $height2;
	       $BMI = round($kei);
	    }else{
		    $BMI = "未入力項目があります";
	    }

	    //基礎代謝の計算
	    if(is_null($sexual)){
		    $BMR = "未入力の項目があります";
	     }else{
	    if(($sexual=="男")&&(!is_null($age)&&!is_null($height)&&!is_null($weight))){
		    $kei1 = 13.397 * $weight +4.799 * $height - 5.677 * $age + 88.362;
                    $BMR = round($kei1);

	    }elseif(($sexual=="女")&&(!is_null($age)&&!is_null($height)&&!is_null($weight)))
	    {
		    $kei1 =  9.247 * $weight + 3.098 *  $height - 4.33 * $age + 447.593;
		    $BMR = round($kei1);
	    }else{
		    $BMR = "未入力の項目があります";
	    }
	    
	    //肥満度の計算
	    if(18 > $BMI){
		    $himan ="低体重";
	    }elseif($BMI >=18 && $BMI < 25){
		    $himan ="普通体重";
	    }elseif($BMI >=25  && $BMI < 30){
		    $himan ="肥満度１";
	    }elseif($BMI >= 30 && $BMI < 35){
		    $himan ="肥満度２";
	    }elseif($BMI >= 35 && $BMI < 40){
		    $himan ="肥満度３";
	    }elseif($BMI > 40){
		    $himan ="肥満度４";
	    }else{
		    $himan="未入力の項目があります";
	    }

	    return view('home',compact('BMI','BMR','himan','name'));
	    }	    
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
