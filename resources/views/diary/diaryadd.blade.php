@extends('layouts.appplan')
<link rel="stylesheet" href="{{ asset('css/diaryadd.css') }}">
@section('body')
<form action="diaryadd" method="post">
  {{ csrf_field() }}

  <h1 class="daytitle">{{$theday}}ダイエット記録</h1>
<div id="diary">
   <input type="hidden" name="day" value="{{$theday}}">
<div id="diary1">
  <h1 class="h1">{{$theday}}の体重</h1>
   <input id="heavy" type="number"name="heavy"min="30"max="200">Kg
</div>
<div id="diary2">
<h1 id="jikkou">{{$theday}}のダイエット実行の有無</h1>
 <select id="jiki"name="jiki">
   <option value="null">実行しましたか?</option>
   <option value="0">ダイエットを実行した</option>
   <option value="1">実行しなかった</option>
 </select>
</div>
<br>
<button class="ok">決定する</button>
</form>
<button onclick="history.back()"class="no">キャンセルする</button>
</div>
@endsection

