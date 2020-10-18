<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
date_default_timezone_set('Asia/Tokyo');


class testController extends Controller
{
	public function index(Request $request)
	{    
	      $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
              $user = $moji2;
		// $today = Carbon::now()->format("Y.m.d");
		/*
		 $today = Carbon::now();
	         $future = $today->addDays(14); 
		 $test =  $today->diffInDays($future);
		 $carbon1 = new Carbon('2016-01-01');
		 $carbon2 = new Carbon('2017-01-01');
		 $future =  $carbon1->diffInDays($carbon2);*/
	   
	/*	$today = date("Y.m.d");
	        $plus = 14;
		$plusday = date("Y.m.d",strtotime("$plus day"));
		$test = var_dump(($plusday - $today)/60/60/24);*/

             $end = DB::table($user)->where('id',1)->value('endday');
	      $endday = str_replace('.', '-',$end);
	     // $test = (strtotime($endday) - strtotime(date('Y-m-d')))/(3600*24); 
	      
	      $startday = DB::table($user)->where('id',1)->value('day');     
	      $start = str_replace('.', '-',$startday);
	     $today = date('Y.m.d');
	      $test = (strtotime($today) - strtotime($start))/(3600*24);

	       $video = DB::table($user)->max('day');
	      if($video > $today){
		      $syamu ="成功した";
	      }

	      return view('test',compact('syamu'));
	}
}
