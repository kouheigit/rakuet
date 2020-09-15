@extends('layouts.appplan')
<!--CSSを読み込む-->
<link rel="stylesheet" href="{{ asset('css/plan1.css') }}">
@section('body')
<h6 class="plan">現在の体重{{$beforeweight}}kgから目標体重{{$weight}}kgまでを{{$periods}}で{{$genryo}}kg減量します</h6>

<!--診断サイトへ移行する(formとbutton)-->
@endsection
