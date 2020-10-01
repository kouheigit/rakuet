<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class diaryController extends Controller
{
	public function index(Request $request)
	{
	      $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
	      $user = $moji2;
	      $today = date("Y.m.d");
	      $record =  DB::table($user)->orderBy('day','desc')->where('id','>',1)->get();             
	      return view('diary.diary',compact('record'));
	}
	public function indexpost(Request $request)
	{
		$theday = $request->input('theday');
		session_start();
		$_SESSION['theday'] = $theday;
		return redirect('diaryadd');
	}
	public function day1(Request $request)
	{
		session_start();
		$theday = $_SESSION['theday'];
		return view('diary.diaryadd',compact('theday'));
	}	
}
