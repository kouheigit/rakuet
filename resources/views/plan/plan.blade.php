@extends('layouts.appplan')
<!--CSSを読み込む-->
<!--<link rel="stylesheet" href="{{ asset('css/homedell.css') }}">-->
@section('body')
@if ($users->weight == null)
<p>ボディデータが登録されていません、ボディデータの登録を完了させて下さい</p>
@else
<h1>あなたが実践するダイエット期間はどれくらいですか</h1>
@endif 
<p>
@endsection

