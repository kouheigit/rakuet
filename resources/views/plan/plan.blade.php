@extends('layouts.appplan')
<!--CSSを読み込む-->
<link rel="stylesheet" href="{{ asset('css/plan.css') }}">
@section('body')
@if ($users->weight == null)
<p>ボディデータが登録されていません、ボディデータの登録を完了させて下さい</p>
@elseif ($users->plan == null)
<h1 class="plan1">あなたはどれくらいの期間ダイエットを予定していますか？</h1>
<form action="plan1" method="post">
{{csrf_field() }}
<div id="ank">
<select class="period"name="period"required>
  <option value="14">2週間</option>
  <option value="30">1ヶ月</option>
  <option value="60">2ヶ月</option>
  <option value="90">3ヶ月</option>
  <option value="120">4ヶ月</option>
  <option value="150">5ヶ月</option>
  <option value ="180">6ヶ月</option>
 </select>
</div>
<div id="button">
<button class="kettei" type='submit'>決定する</button>
</div>
@else
<h1>ここから下にデータベースからダイエットプランを表示させる</h1>
@endif 
<p>
@endsection

