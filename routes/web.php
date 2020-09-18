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

Route::get('test','testController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('home','HomeController@homes');
Route::get('home2','HomeController@home2');
Route::post('home2','HomeController@home2post');
Route::get('homedell','HomeController@homedell');
Route::post('dellmember','HomeController@dellmember');
Route::get('plan','planController@index');
Route::post('plan1','planController@plan');
Route::get('plan2','planController@plan2');
Route::post('plan2','planController@plan2post');
Route::get('plan3','planController@plan3');
Route::post('plan3','planController@plan3post');
Route::get('plannoswim','planController@plannoswim');
Route::post('plannoswim','planController@plannoswimpost');
//noswimpostを記述予定
Route::get('plannocommute','planController@plannocommute');
Route::post('plannocommute','planController@plannocommutepost');
Route::get('plannocycle','planController@plannocycle');
Route::post('plannocycle','planController@plannocyclepost');
Route::get('plannostation','planController@plannostation');
Route::post('plannostation','planController@plannostationpost');


Route::get('plan4','planController@plan4');
Route::get('error','planController@error');
Route::post('error','planController@error1');
Route::get('result','planController@result');

