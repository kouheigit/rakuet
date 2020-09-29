@extends('layouts.app3')

@section('body')
<link rel="stylesheet" href="{{ asset('css/diary.css') }}">
<h1 id="main">体重記録</h1>
<br>
<!--aタグの中にpostへ渡す処理をする-->
<!--携帯版の奴はtdを左へずらす-->
<!--aタグは記録する画面に遷移する-->
<table>
<tr>
  <td>日付</td>
  <td>体重</td>
  <td>実行</td>
</tr>
@foreach ($record as $records)
<tr>
  <td><a class="heavy"href="day1"?today="{{$records->day}}">{{$records->day}}</a></td>
@if ($records->weight == null)
  <td><a class="heavy"href="day1"?today="{{$records->day}}">未入力です</a></td>
@else
  <td><a class="heavy"href="day1"?today="{{$records->day}}">{{$records->weight}}</a></td>
@endif
@if ($records->jiki == null) 
  <td><a class="heavy"href="day1"?today="{{$records->day}}">未入力です</a></td>
@else
  <td><a class="heavy"href="day1"?today="{{$records->day}}">{{$records->jiki}}</a></td>
@endif
</tr>
@endforeach
</a>
</table>
@endsection

