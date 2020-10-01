@extends('layouts.app3')

@section('body')
<link rel="stylesheet" href="{{ asset('css/diary.css') }}">
<h1 id="main">体重記録</h1>
<br>
<!--aタグの中にpostへ渡す処理をする-->
<!--携帯版の奴はtdを左へずらす-->
<!--aタグは記録する画面に遷移する-->
<form action="diary" method="post">
     {{ csrf_field() }}
<table>
<tr>
  <td>日付</td>
  <td>体重</td>
  <td>実行</td>
</tr>
@foreach ($record as $records)
<tr>
  <td><p class="heavy">{{$records->day}}</p>
@if ($records->weight == null)
  <td><p class="heavy">未入力です</p></td>
@else
  <td><p class="heavy">{{$records->weight}}</p></td>
@endif
@if ($records->jiki == null) 
  <td><p class="heavy">未入力です</p></td>
@else
  <td><p class="heavy">{{$records->jiki}}</p></td>
@endif
  <td><button type='submit'name='theday'value='{{$records->day}}'>ボディーデータを登録する</button></td>
</tr>
</form>
@endforeach
</table>
@endsection
