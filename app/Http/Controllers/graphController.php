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
	    return view('graph.graph');
    }
}
