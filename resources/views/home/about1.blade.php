@extends('layouts.about1')
@section('body')
<link rel="stylesheet" href="{{ asset('css/about1.css') }}">
 <h1 id="method1">有料プランの登録、使用方法</h1>
 <p class="main">まずは減量体重の確認画面の下のボタンの有料サービスを使うボタンを押してみましょう</p>
 <img class="step1" src="{{ asset('img/yuryo1.png') }}">
 <p class="main1">すると決済に関する説明ページが出てきます、説明を読んだ後決済するボタンを押してみましょう</p>
 <img class="step2" src="{{ asset('img/yuryo2.png') }}">
 <p class="main2">登録料は１００円になります、決済方法ははクレジットカード支払いのみとなります。一度有料プランの登録料を支払うとそのアカウントでは登録料を支払う必要なく有料プランが使用出来ます</p>
<p class="main3">【注意】会員情報を削除して、再度登録した際には登録料を支払う必要があります</p>
<img class="step4" src="{{ asset('img/yuryo3.png') }}">
<p class="main4">決済をするボタンを押した場合はメールアドレス情報とクレジットカード決済情報を入力して下さい。登録料を支払った後はプラン一覧ページに移ります</p>
<img class="step4" src="{{ asset('img/yuryo4.png') }}">
<p class="main5">プラン一覧ページから自分にあったプランを選択します</p>
<img class="step6" src="{{ asset('img/yuryo6.png') }}">
<p class="main6">プランを選択するとダイエットプランが表示され、そのダイエットプランが気に入った場合は決定ボタンを押して下さい</p>
<img class="step7" src="{{ asset('img/yuryo7.png') }}">
<p class="main7">決定ボタンを押すとダイエットプランが決定されます。</p>
@endsection

