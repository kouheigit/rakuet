<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//test↓
use Carbon\Carbon;
date_default_timezone_set('Asia/Tokyo');
//テストコード50行目
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
     public function index(Request $request)
    {
	    $users = Auth::user()->email;//user情報の取り出しemailの読み込み(重要)
	    $name = Auth::user()->name;
	    $moji1=$users;
            $moji1 = str_replace('@','',$moji1);
            $moji2 = str_replace('.','',$moji1);
	    $user = $moji2;

	    $datetoday = date("Y年m月d日");
	    //後に仕様変更する 
	    $atai = DB::table($user)->where('id','1')->first();
	    $weightinfo = DB::table($user)->whereNotNull('weight')->max('day');
               //↓【重要】取得したIDを元に最後に入力された体重を取得
            $weight = DB::table($user)->where('day',$weightinfo)->value('weight');
	    $age = $atai->age;
	    $sexual =$atai->sexual;
	    $height =$atai->height;
	    //体重はdiaryから最新のデータを取ってくる
	    //$ataiとは違うクエリを作り下の文も適宜変更する
	   // $weight =$atai->weight;
	    $setumei = null;
	    $BMR1 = null;
	    /*テストデータ
	    
	     $plus = 14;
	     $today = date("Y.m.d",strtotime("$plus day"));
	     */
	    //日付取得
	   $today = date("Y.m.d");
	    //DBからダイエット終了日を呼び出して整数のみに生成する
            $endDB = DB::table($user)->where('plan',1)->get('endday');
	    $endday = preg_replace('/[^0-9]/', '', $endDB);

	    //DBから本日の日時を取得する
	   $nowDB =  DB::table($user)->where('day',$today)->get('day');
	    $nowday = preg_replace('/[^0-9]/', '', $nowDB);

	    //nullとnullで実行時エラーになる 
	    if(($endday==!NULL&&$nowday==!NULL)&&($endday==$nowday)){
		 //日付がダイエット終了期間になるとplan機能を停止させる
		 DB::table($user)->where('id','1')->update(['daystart'=>"2"]);
	    }
	    

	    if(is_null($height)&&is_null($weight)&&is_null($age)&&is_null($sexual)&&is_null($setumei))
	    {
		    $BMI = "未入力の項目がありましたので表示出来ませんでした";
		    $BMR = "未入力の項目がありましたので表示できませんでした";
		    $weight="未入力の項目がありましたので表示できませんでした";
		    $himan="";
		    $gazou ='img/hatena.png';
		    $setumei ='';
		    return view('home',compact('BMI','BMR','himan','name','weight','gazou','setumei'));
	    }else{
	    
	    //BMIの計算
	    if(!is_null($height)&&!is_null($weight))
	    {
	       $height1 = $height/100;
	       $height2 = $height1 * $height1;
	       $kei = $weight / $height2;
	       $BMI = round($kei);
	       $BMI.="です";
	    }else{
		    $BMI = null;
	    }

	    //基礎代謝の計算
	    if(is_null($sexual)){
		    $BMR = "未入力の項目があったので表示出来ませんでした";
		    $hantei ="";
	     }else{
	    if(($sexual=="男")&&(!is_null($age)&&!is_null($height)&&!is_null($weight))){
		    $kei1 = 13.397 * $weight +4.799 * $height - 5.677 * $age + 88.362;
		    $BMR1 = round($kei1);
		    $BMR = $BMR1;
		    $BMR2 = $BMR1 + 300;
		    $BMR3 = $BMR1 + 100;
		    $BMR.="kcalです";
		    $hantei="1";

	    }elseif(($sexual=="女")&&(!is_null($age)&&!is_null($height)&&!is_null($weight)))
	    {
		    $kei1 =  9.247 * $weight + 3.098 *  $height - 4.33 * $age + 447.593;
		    $BMR1 = round($kei1);
		    $BMR = $BMR1;
		    $BMR2 = $BMR1 + 300;
                    $BMR3 = $BMR1 + 100;
		    $BMR.="kcalです";
		    $hantei="1"; 
	    }else{
		    $BMR1=null;
		    $hantei  = "";
		    $BMR = "未入力の項目があったので表示できませんでした";
	    }
	
	    //肥満度の計算

	    if(is_null($BMI)){
		    $BMI ="未入力の項目があります";
		    $gazou = null;
		    $himan ="未入力の項目があります";
		    $setumei = null;
	    }elseif(18 > $BMI){
		    $himan =$name."さんの体重は低体重です";
		    $setumei = null;
            if($sexual=="女"){
                     $gazou ='img/woman.png';
	    }else{
	             $gazou ='img/man.png';
            }
	    }elseif($BMI >=18 && $BMI < 25){
		    $himan =$name."さんの体重は適正体重です";
		    $setumei = null;
	   if($sexual=="女"){
		   $gazou ='img/woman1.png';
            }else{
		    $gazou='img/man1.png';
	    }
	    }elseif($BMI >=25  && $BMI < 30){
		    $himan =$name."さんの肥満度は１です";
	   if($sexual=="女"){
		   $gazou ='img/woman2.png';
            }else{
		    $gazou ='img/man2.png';
            }
	    }elseif($BMI >= 30 && $BMI < 35){
		    $himan =$name."さんの肥満度は２です";
		    $setumei =null;
	    if($sexual=="女"){
		    $gazou ='img/woman3.png';
            }else{
		    $gazou ='img/man3.png';
	    }	    
	    }elseif($BMI >= 35 && $BMI < 40){
		    $himan =$name."さんの肥満度は３です";
		    $setumei ="高度肥満になります";
	    if($sexual=="女"){
                    $gazou ='img/woman4.png';
            }else{
                    $gazou ='img/man4.png';
            }            
	    }elseif($BMI >= 40){
		    $himan = $name."さんの肥満度は４です";
		    $setumei ="高度肥満になります";
	   if($sexual=="女"){
                    $gazou ='img/woman5.png';
            }else{
                    $gazou ='img/man5.png';
            }

	    }else{
		    $himan="未入力の項目があります";
	    }

           //画像処理

	    //weightの文字列結合は必ず一番最後にする
	    $weight.="kgです";


	    return view('home',compact('datetoday','BMI','BMR','hantei','BMR1','BMR2','BMR3','himan','name','weight','setumei','gazou'));
	     }	  
	    }  
     }

    public function homes(Request $request)
    {       
	    $dells = $request->input('dells');
	    if($dells=='1'){
		   return redirect('homedell');
             }
	    $users = Auth::user()->email;
            $moji1=$users;
            $moji1 = str_replace('@','',$moji1);
	    $moji2 = str_replace('.','',$moji1);
	    $user = $moji2;
	    $users =  DB::table($user)->where('id',1)->first();

            $weightinfo = DB::table($user)->whereNotNull('weight')->max('day');
               //↓【重要】取得したIDを元に最後に入力された体重を取得
            $weight = DB::table($user)->where('day',$weightinfo)->value('weight');	    
              
	     return view('home.home2',compact('users','weight')); 
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
	   if(!is_null($sexual)&&$sexual==!'0'){
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
	    return redirect('/');
    }
    public function about(Request $request)
    {
	    return view('home.about');
    }
    public function about1(Request $request)
    {
	    return view('home.about1');
    }
}
