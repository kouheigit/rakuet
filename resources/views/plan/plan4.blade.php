@extends('layouts.appplan')
<link rel="stylesheet" href="{{ asset('css/plansub.css') }}">
@section('body')
<p class="question">質問:運動は積極的に取り入れたい</p>
<form action="plan4" method="post">
{{ csrf_field() }}
<div id="button">
<button class="sindan"type='submit'name='atai'value="0">YES</button>
<button class="sindan1" type='submit'name='atai1'value="1">NO</button>
</div>
<button class="sindan2" type='submit'name='atai2'value="2">戻る</button>
@endsection

