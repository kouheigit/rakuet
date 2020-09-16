@extends('layouts.appplan')
<link rel="stylesheet" href="{{ asset('css/planmain.css') }}">
@section('body')
<p class="no">仕事や生活スタイルはとてもハードなので<br>どんな工夫をしても隙間時間はとれないので<br>間食は絶対に出来ない</p>

<p class="yes">仕事や生活スタイルの中で間食ができる<br>または工夫をすれば間食が可能である</p><p class="suisyo">↑楽エット推奨ダイエット法</p>
<img class="gazou1" src="{{ asset('img/hardwork.png') }}">
<img class="gazou2" src="{{ asset('img/easy.png') }}">
<form action="plan2" method="get">
{{ csrf_field() }}
<div id="button">
<button class="sindan" type='submit'name='atai'value='0'>間食は絶対に出来ない</button>
</div>
<button class="sindan1" type='submit'name='atai1'value='1'>間食は可能である</button>
<p class="test">.</p>
@endsection
