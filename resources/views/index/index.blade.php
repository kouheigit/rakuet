@extends('index.indexlayout')

@section('content')
<title>楽エット|完全無料の健康管理ツール</title>
<meta name="description" content="楽エットはあなたの体に負担の少ないダイエット方法を診断、ダイエットサポートをする健康管理ツールです。中々痩せない、痩せたいけどハードな運動や辛いダイエットが苦手な方におすすめのツールです"/>
<form action="index2" method="post">
{{ csrf_field() }}
  <button class="start" type='submit' name='start' value='start'>スタートする</button>
</form>
<h1 class="dai1">身体情報を入力するだけでダイエットに必要<br>なカロリー数やBMIなどを割り出します。</h1>
<p class="text1">身長、体重、年齢、性別の四項目を入力するとその値<br>をもとにダイエットに必要な消費カロリーやBMIなど<br>を割り出します</p>

<p class="text1m">身長、体重、年齢、性別の<br>四項目を入力するとその値<br>をもとにダイエットに必要な<br>消費カロリーやBMIなどを<br>割り出します</p>

<h1 class="dai2">理想的なダイエットルーチンを築きましょう!!!</h1>
@endsection
