<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
date_default_timezone_set('Asia/Tokyo');

class graphController extends Controller
{
    public function index(Request $request)
    {
	      $users = Auth::user()->email;
              $moji1=$users;
              $moji1 = str_replace('@','',$moji1);
              $moji2 = str_replace('.','',$moji1);
              $user = $moji2;

	    $syamu = "これは成功です";
	    $syamu2 = ["3","4","10","300"];
	   // $syamu5  = DB::table($user)->where('id','>',1)->value('weight');

	    return view('graph.graph',compact('syamu','syamu2','syamu5'));
    }
}
