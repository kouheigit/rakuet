<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
       //return view('welcome');
        return redirect('index');
});

Route::get('index','indexController@index');
Route::post('index2','indexController@index2');

Route::get('login','loginController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
