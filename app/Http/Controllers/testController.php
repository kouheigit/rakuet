<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
	public function index(Request $request)
	{
		$data = ['msg'=>'TESTデータを送信します'];
		return view('test',$data);
	}
}
