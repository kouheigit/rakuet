<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
	public function index(Request $request)
	{
		return view('index.index');
	}

	public function index2(Request $request)
	{
		$start = $request->input('start');
		if(!empty($start)){
		   return redirect('login');
		   //redirectはloginファイルを読み込む
		}
		  
	}
}
