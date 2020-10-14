@extends('layouts.appplan2')
@section('body')
<link rel="stylesheet" href="{{ asset('css/diaryresult.css') }}">
<h1 class="title">あなたのダイエット結果は</h1>
<!--resultを入れる-->
<p class="text">{{$result}}</p>
<form action="diaryresult" method="post">
{{ csrf_field() }}
<div id="button">
<button class="yes"type='submit'name='continue1'value="0">YES</button>
<button class="no" type='submit'name='continue2'value="1">NO</button>
@endsection
