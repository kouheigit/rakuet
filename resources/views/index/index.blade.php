@extends('index.indexlayout')

@section('content')
<title>楽エット|完全無料の健康管理ツール</title>
<meta name="description" content="楽エットはあなたの体に負担の少ないダイエット方法を診断、ダイエットサポートをする健康管理ツールです。中々痩せない、痩せたいけどハードな運動や辛いダイエットが苦手な方におすすめのツールです"/>
<form action="index2" method="post">
{{ csrf_field() }}
  <button class="start" type='submit' name='start' value='start'>スタートする</button>
</form>

@endsection
