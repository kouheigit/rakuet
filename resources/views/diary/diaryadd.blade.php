@extends('layouts.appplan')
<!--<link rel="stylesheet" href="{{ asset('css/plansub.css') }}">-->
@section('body')
<form action="diaryadd" method="post">
  {{ csrf_field() }}
  <h1 class="daytitle">{{$theday}}のダイエット記録</h1>
   <input type="hidden" name="day" value="{{$theday}}">
  <h1 class="h1">{{$theday}}の体重</h1>
   <input class="heavy" type="number"name="heavy"min="30"max="200">
<h1 class="jikkou">{{$theday}}のダイエット実行の有無</h1>
 <select class="jiki"name="jiki">
   <option value="null">実行しましたか?</option>
   <option value="1">ダイエットを実行した</option>
   <option value="0">実行しなかった</option>
 </select>
<button class="ok">決定する</button>
</form>
<button onclick="history.back()"class="no">キャンセルする</button>
@endsection

