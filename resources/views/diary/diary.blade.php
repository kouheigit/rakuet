@extends('layouts.app3')

@section('body')
<link rel="stylesheet" href="{{ asset('css/diary.css') }}">
<h1 id="main">体重記録</h1>
<!--携帯版の奴はtdを左へずらす-->
<!--aタグは記録する画面に遷移する-->
<form action="diary" method="post">
     {{ csrf_field() }}
<table>
<tr>
   <td>経過日  {{$progress}}</td>
   <td>開始日　{{$startday}}</td>
   <td>終了日　{{$endday}}<td/>
</tr>

<tr>
  <td>日付</td>
  <td>体重</td>
  <td>実行</td>
</tr>
@if ($daystart == null)
<tr>
  <td><p class="heavy">planが未入力です</p></td>
  <td><p class="heavy">planが未入力です</p></td>
  <td><p class="heavy">planが未入力です</p></td>
</tr>
@elseif ($daystart == 2)
<tr>
  <td><p class="heavy">planが終了しました</p></td>
  <td><p class="heavy">planが終了しました</p></td>
  <td><p class="heavy">planが終了しました</p></td>
</tr>
@endif
@foreach ($record as $records)
<tr>
  <td><p class="heavy">{{$records->day}}</p>
@if ($records->weight == null)
  <td><p class="heavy">未入力です</p></td>
@else
  <td><p class="heavy">{{$records->weight }}kg</p></td>
@endif
@if ($records->jiki == null) 
  <td><p class="heavy">未入力です</p></td>
@elseif ($records->jiki == 0)
  <td><p class="heavy">実行済</p></td>
@elseif ($records->jiki == 1)</p></td>
  <td><p class="heavy">未実行</p></td>   
@endif
  <td><button type='submit' class="theday"name='theday'value='{{$records->day}}'>記録する</button></td>
</tr>
</form>
@endforeach
</table>
@endsection
