@extends('layouts.apphome')

@section('body')
<link rel="stylesheet" href="{{ asset('css/homedell.css') }}">
<h3 class="delldai">CAUNTION!!!</h3>
<p class="dai">【注意】</p>
<p class="dell">ダイエットプランを中断するとプランが初期化され今までの体重記録が失われますがよろしいですか？</p>
<form action="plandelldecide" method="post">
{{csrf_field() }}
<button class="dellmember" type='submit' name='plandell' value="1">このプランを中断する</button>
@endsection

