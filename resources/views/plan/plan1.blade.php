@extends('layouts.appplan')
<!--CSSを読み込む-->
<link rel="stylesheet" href="{{ asset('css/plan1.css') }}">
@section('body')
<h6>{{$weight}}</h6>
<p>{{$periods}}</p>
<p>{{$genryo}}</p>
@endsection
