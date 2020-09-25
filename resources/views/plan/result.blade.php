@extends('layouts.appplan2')
<!--appplan2はjavascriptを除外した奴-->
<!--CSSを読み込む-->
<link rel="stylesheet" href="{{ asset('css/result.css') }}">
@section('body')
<p class="sub">あなたにおすすめなダイエット方法は………</p>
<h1 class="title">{{$plandb}}</h1>
<br>
<p class="text">{{$plandb1}}</p>
@if ($img == 1)
<img class="planimg" src="{{ asset('img/nomal.png') }}">
@elseif ($img == 15)
<img class="planimg" src="{{ asset('img/15.png') }}">
@elseif ($img == 20)
<img class="planimg" src="{{ asset('img/20.png') }}">
@elseif ($img == 21)
<img class="planimg" src="{{ asset('img/21.png') }}">
@elseif ($img == 22)
<img class="planimg" src="{{ asset('img/22.png') }}">
@endif
<p class="plan">{{$today}}から{{$afterday}}までの{{$period}}日間の間で{{$beforeweight}}kgから{{$weight}}kgまでの{{$genryo}}kgを{{$plandb}}で減量する計画を実行します</p>
<div id ="result">
<form action="result" method="post">
{{ csrf_field() }}
<button class="yes" type='submit' name='yes' value="1">このプランで決定する</button>
<button class="no" type='submit' name='no' value="2">このプランはやめる</button>
</div>
@endsection
