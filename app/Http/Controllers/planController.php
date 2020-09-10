<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class planController extends Controller
{
	public function index(Request $request)
	{
	//データ・ベースで調べてボディデータがなければ分岐させる
        //分岐はifブレード分岐でさせる
		//データベースのplanカラムを調べてplan番号がない場合はif文で分岐させる
	    $users = Auth::user()->email;
            $moji1=$users;
            $moji1 = str_replace('@','',$moji1);
            $moji2 = str_replace('.','',$moji1);
            $user = $moji2;
	    $users =  DB::table($user)->where('id',1)->first();
	    return view('plan.plan',compact('users'));
	}
	public function result(Request $request)
	{
		return view('plan.result');
	}
}
