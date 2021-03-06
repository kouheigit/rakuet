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
Route::get('/','indexController@index');

//Route::get('index','indexController@index');
Route::post('index2','indexController@index2');

Route::get('login','loginController@login');

Route::get('test','testController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('home','HomeController@homes');
Route::get('home2','HomeController@home2');
Route::post('home2','HomeController@home2post');
Route::get('homedell','HomeController@homedell');
Route::get('about','HomeController@about');
Route::get('about1','HomeController@about1');
Route::post('dellmember','HomeController@dellmember');
//plan
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
Route::get('planlittlehard','planController@planlittlehard');
Route::post('planlittlehard','planController@planlittlehardpost');
Route::get('plannodanjiki','planController@plannodanjiki');
Route::post('plannodanjiki','planController@plannodanjikipost');
Route::get('plannoprotein','planController@plannoprotein');
Route::post('plannoprotein','planController@plannoproteinpost');
Route::get('plannosport','planController@plannosport');
Route::post('plannosport','planController@plannosportpost');
Route::get('planlittleeat','planController@planlittleeat');
Route::post('planlittleeat','planController@planlittleeatpost');
Route::get('plannonote','planController@plannonote');
Route::post('plannonote','planController@plannonotepost');

Route::get('plan4','planController@plan4');
Route::post('plan4','planController@plan4post');
Route::get('planyesswim','planController@planyesswim');
Route::post('planyesswim','planController@planyesswimpost');
Route::get('planyescommute','planController@planyescommute');
Route::post('planyescommute','planController@planyescommutepost');
Route::get('planwalkstation','planController@planwalkstation');
Route::post('planwalkstation','planController@planwalkstationpost');
Route::get('planyeslittelhard','planController@planyeslittelhard');
Route::post('planyeslittelhard','planController@planyeslittelhardpost');
Route::get('planyesprotein','planController@planyesprotein');
Route::post('planyesprotein','planController@planyesproteinpost');
Route::get('planoneday','planController@planoneday');
Route::post('planoneday','planController@planonedaypost');
Route::get('planyesnote','planController@planyesnote');
Route::post('planyesnote','planController@planyesnotepost');
Route::get('planyeslittleeat','planController@planyeslittleeat');
Route::post('planyeslittleeat','planController@planyeslittleeatpost');
Route::get('planafternoon','planController@planafternoon');
Route::post('planafternoon','planController@planafternoonpost');
Route::get('plancontinue','planController@plancontinue');
Route::get('plancontinue1','planController@plancontinue1');
Route::post('plancontinue1','planController@plancontinue1post');
//エラーと結果画面
Route::get('error','planController@error');
Route::post('error','planController@error1');
Route::get('result','planController@result');
Route::post('result','planController@resultpost');
//削除
Route::post('plandell','planController@plandell');
Route::get('plandell','planController@plandelldecide');
Route::post('plandelldecide','planController@plandelldecidepost');

//stripe
Route::get('stripe','stripeController@index');
Route::get('paid','stripeController@paid');
Route::get('stripestart','stripeController@stripestart');
Route::get('striperesult','stripeController@striperesult');
Route::post('/charge', 'stripeController@charge');
Route::post('charge1','stripeController@charge1');
Route::post('chargeauth','stripeController@chargeauth');


//diaryController
Route::get('diary','diaryController@index');
Route::post('diary','diaryController@indexpost');
Route::get('diaryadd','diaryController@day1');
Route::post('diaryadd','diaryController@day1post');
Route::get('diaryresult','diaryController@diaryresult');
Route::post('diaryresult','diaryController@diaryresultpost');

//graphController
Route::get('graph','graphController@index');
Route::get('graph1','graphController@graph1');
Route::get('graphpie','graphController@graphpie');
Route::get('graph2','graphController@graph2');
Route::post('graph','graphController@graphpost');
