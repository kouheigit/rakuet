<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
	public function login(Request $request)
	{
		return view('login.login');
	}
}
