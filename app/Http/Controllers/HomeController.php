<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        return view('home');
    }
    public function home2(Request $request)
    {
	    $start = $request->input('start');
	    $atai = 'hikakin';
	    $maxmurai = 'maxmurai';
	    
	    if(!empty($start)){
		    /*
		    $murai ="drop table $atai";
		    $syamu =$murai;
		    $start =  DB::statement($syamu);*/
		   
		    $haramin ="create table $maxmurai(id int, name varchar(10), col varchar(10))";
		    $appbank =$haramin;
		    $end = DB::statement($appbank);
		 //  $end = DB::statement('create table hikakin(id int, name varchar(10), col varchar(10))');
	    }
	   return view('home.home2'); 
	   // return view('home.home2',compact('start'));

    }
}