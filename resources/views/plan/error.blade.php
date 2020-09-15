@extends('layouts.appplan')
<!--CSSを読み込む-->
<link rel="stylesheet" href="{{ asset('css/error.css') }}">
@section('body')
<p class="error">{{$error}}</p>
<p class="error1">{{$error1}}</p>
<p class="error2">{{$error2}}</p>
<p class="error3">{{$error3}}</p>
<form action="error" method="post">
{{ csrf_field() }}
<div id="button">
<button class="modoru" type='submit'name='return'value='1'>戻る</button>
</div>
@endsection
