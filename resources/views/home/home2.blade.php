@extends('layouts.apphome')
@section('body')
<link rel="stylesheet" href="{{ asset('css/hensyu.css') }}">
<form id ="soudai" action="home2" method="post">
  {{ csrf_field() }}
@if($users != null)
  <h5 class="toshi">年齢(設定した年齢{{$users->age}}歳)</h5>
    <input type="number"class="age" name="age"min="12"maxlength="100">
     <p class="ages">歳</p>
   </input>
  <h2 class="hv">体重(設定した体重{{$users->weight}}kg)</h2>
  <input class="heavy" type="number"name="heavy"min="30"max="200">
   <p class="hensyu">kg</p>
  </input>
 <h3 class="seibetu">性別(設定した性別{{$users->sexual}}性)</h3>
 <select class="sexual"name="sexual">
  <option value="女">女性</option>
  <option value="男">男性</option>
 </select>
 <h4 class="sintyo">身長(設定した身長{{$users->height}}cm)</h4>
 <input class="tall" type="number" name="tall"min="110"max="210">
 <p class="sintyo1">cm</p>
 </input>
 <br>
 <button class='homechange'type='submit'>ボディーデータを登録する</button>
</form>
@endif
@endsection

