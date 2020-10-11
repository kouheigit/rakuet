<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
	public function index(Request $request)
	{
		$msg ='TESTデータを送信します';
		session_start();
		$testcode = $_SESSION['testcode'];
		return view('test',compact('msg','testcode'));
	}
}
