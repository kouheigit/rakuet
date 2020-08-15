@extends('layouts.apphome')

@section('body')
<form action="dellmember" method="post">
{{csrf_field() }}
<button class="dellmember" type='submit' name='dellmember' value="{{ Auth::user()->email }}">会員データを完全に削除する</button>
@endsection
