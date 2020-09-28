<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class diaryController extends Controller
{
	public function index(Request $request)
	{
		return view('diary.diary');
	}
}
