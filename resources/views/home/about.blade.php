@extends('layouts.about')
@section('body')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<h1 id ="dai">健康管理ツール楽エットについて</h1>
<p class="main">楽エットはあなたの直感でサクサク使用できる健康管理ツールです。楽エットはあなたの体型データを表示するホーム画面、ダイエット診断や現在遂行しているダイエット方法を振り返る事が出来るダイエットプラン画面、今日のダイエット記録を記す事が出来るdiary画面の４つの機能から成り立っています。</p>
<h1 id="method1">手順１　ボディデータを登録する</h1>
<p class="main1">まずはホーム画面のボディデータ登録画面でボディデータを登録しましょう下記のような状態ではまだ楽エットの機能は使用できません。まずはホーム画面のボディデータの登録、編集ボタンを押して下さい</p>
<img class="step1" src="{{ asset('img/step1.png') }}">
<p class="main2">登録ボタンを押すと次はボディデータを登録出来ます、身長、体重、年齢、性別を入力し終えたらBMI、BMR、あなたに適切な運動量などを計算して表示してくれます。</p>
<img class="step2" src="{{ asset('img/step2.png') }}">
<p class="main3">ボディデータ登録後ホーム画面が以下のような画面に切り替わります。↓</p>
<img class="step2" src="{{ asset('img/step3.png') }}">
<h1 id="method2">手順２　プラン診断を受ける</h1>
@endsection 

