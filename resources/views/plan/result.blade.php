@extends('layouts.appplan')
<!--CSSを読み込む-->
<link rel="stylesheet" href="{{ asset('css/result.css') }}">
@section('body')
<p class="sub">あなたにおすすめなダイエット方法は………</p>
<h1 class="title">{{$plandb}}</h1>
<br>
<p class="text">{{$plandb1}}</p>
@endsection

