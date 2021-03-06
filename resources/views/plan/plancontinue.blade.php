@extends('layouts.appplan2')
<!--CSSを読み込む-->
<link rel="stylesheet" href="{{ asset('css/plan.css') }}">
@section('body')
<h1 class="plan1">あなたはどれくらいの期間ダイエットを<br>予定していますか？</h1>
<h1 class="plan2">現在の体重からどれくらい減量しますか?</h1>
<form action="plan1" method="post">
{{csrf_field() }}
<div id="ank">
<select class="period"name="period"required>
  <option value="14">2週間</option>
  <option value="30">1ヶ月</option>
  <option value="60">2ヶ月</option>
  <option value="90">3ヶ月</option>
  <option value="120">4ヶ月</option>
  <option value="150">5ヶ月</option>
  <option value ="180">6ヶ月</option>
 </select>
</div>
<input id="hev"type="number"name="hev"min="30"max="{{$weight}}"value="{{$weight}}"required></input>
<p class="hevkg">Kg</p>
<div id="button">
<div id="cauntion">
<p class="cauntion">※減量の目安は一ヶ月で大体2~4kgを目安に減量計画をたてましょう</p>
</div>
<button class="kettei" type='submit'>決定する</button>
@endsection
