@extends('layouts.appplan1')
<!--CSSを読み込む-->
<link rel="stylesheet" href="{{ asset('css/plan1.css') }}">
@section('body')
<h6 class="plan">現在の体重{{$beforeweight}}kgから目標体重{{$weight}}kgまでを{{$periods}}で{{$genryo}}kg減量します</h6>
<form action="plan2" method="get">
{{ csrf_field() }}
<div id="button">
<button class="sindan" type='submit'name='atai'value=1>プラン診断を開始する</button>
<button class="sindan" type='submit'name='atai'value=2>有料サービスを使う</button>
</div>
</form>

@endsection
