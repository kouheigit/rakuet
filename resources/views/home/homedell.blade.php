@extends('layouts.apphome')

@section('body')
<link rel="stylesheet" href="{{ asset('css/homedell.css') }}">
<h3 class="delldai">CAUNTION!!!</h3>
<p class="dai">【注意】</p>
<p class="dell">会員情報を削除すると、会員情報や今までの体重データや
ボディデータなどはすべて削除され、元に戻せなくなります。よろしいですか？</p>
<form action="dellmember" method="post">
{{csrf_field() }}
<button class="dellmember" type='submit' name='dell' value="{{ Auth::user()->email }}">会員データを完全に削除する</button>
@endsection
