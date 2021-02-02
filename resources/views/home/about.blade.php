@extends('layouts.about')
@section('body')
<head>
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
<title>楽エットについて</title>
<meta name="description" content="楽エットの機能説明"/>
</head>
<h1 id ="dai">健康管理ツール楽エットについて</h1>
<p class="main">楽エットはあなたの直感でサクサク使用できる健康管理ツールです。楽エットはあなたの体型データを表示するホーム画面、ダイエット診断や現在遂行しているダイエット方法を振り返る事が出来るダイエットプラン画面、今日のダイエット記録を記す事が出来るdiary画面の４つの機能から成り立っています。</p>
<h1 id="method1">手順１　ボディデータを登録する</h1>
<p class="main1">まずはホーム画面のボディデータ登録画面でボディデータを登録しましょう下記のような状態ではまだ楽エットの機能は使用できません。まずはホーム画面のボディデータの登録、編集ボタンを押して下さい</p>
<img class="step1" src="{{ asset('img/step1.png') }}">
<p class="main2">登録ボタンを押すと次はボディデータを登録出来ます、身長、体重、年齢、性別を入力し終えたらBMI、BMR、あなたに適切な運動量などを計算して表示してくれます。</p>
<img class="step2" src="{{ asset('img/step2.png') }}">
<p class="main3">ボディデータ登録後ホーム画面が以下のような画面に切り替わります。↓</p>
<img class="step3" src="{{ asset('img/step3.png') }}">
<h1 id="method2">手順２　プラン診断を受ける</h1>
<p class="main4">ボディデータの登録が完了したらプラン画面のプラン診断を受ける事が可能になります。プラン画面を見てみると以下のような画面になりますのでダイエットを実施する期間と目標体重を決めて見ましょう↓</p>
<img class="step4" src="{{ asset('img/step4.png') }}">
<p class="main5">実施期間を決定したら体重の予定減量数値を確認出来ます。（有料プランに申し込むとプラン診断を受けずにダイエットメニューを選択する事が出来ます<br><a href="about1">有料プランについて説明はこちらのページへ</a></p>
<img class="step5" src="{{ asset('img/step5.png') }}">
<p class="main6">プラン診断開始を選択するとプラン診断が開始されプラン診断を受けていきます</p>
<img class="step6" src="{{ asset('img/step6.png') }}">
<p class="main7">ダイエットプランが診断され、診断されたダイエットプランが自身にあっていると思えば"このプランで決定する"ボタンを押せばこのダイエットプランでのダイエットがスタートします</p>
<img class="step7" src="{{ asset('img/step7.png') }}">
<p class="main8">ダイエットプランが決定されるとこれから実施するダイエットプランが決定されプラン画面が以下の用に固定されます</p>
<img class="step8" src="{{ asset('img/step8.png') }}">
<h1 id="method3">手順３　diary機能で記録をつける</h1>
<p class="main9">ダイエットプランが決定されるとdiary機能が更新されdiary機能が使えるようになります。diary機能はダイエット終了期間まで使用する事ができ、日々の体重とダイエット実行の有無を記録することが出来ます（初日のみボディデータから体重が反映され体重が予め記述されております）</p>
<img class="step9" src="{{ asset('img/step9.png') }}">
<p class="main10">diary機能の記述欄は日付が進む事に更新されていきます</p>
<img class="step10" src="{{ asset('img/step10.png') }}">
<p class="main11">diary機能の体重記録欄に入って見ましょう。すると体重を２つの記述欄が出てきます、体重記述欄ダイエット実行の有無についての記述欄になります</p>
<img class="step11" src="{{ asset('img/step11.png') }}">
<p class="main12">本日の体重とダイエット実行の記録をつけてみましょう。</p>
<img class="step12" src="{{ asset('img/step12.png') }}">
<p class="main13">ダイエット記録をつけ終わったら記録一覧ページに戻ってみましょう。すると本日の記録が記録一覧ページに反映されているのがわかります。</p>
<img class="step13" src="{{ asset('img/step13.png') }}">
<h1 id="method4">手順４　グラフ機能を使用する</h1>
<p class="main14">体重とダイエット実行記録の記録した後に次はグラフ機能を使って見ましょう、メニューバーにあるグラフをクリックしてみると体重の推移が記録されています</p>
<img class="step14" src="{{ asset('img/step14.png') }}">
<p class="jikkou">次にダイエットの実行率を見てみましょう、グラフページの下部に前の10件、次の10件、ダイエット実行率の３つのボタンがあり、このうちのダイエット実行率のボタンを押してみましょう。</p>
<img class="jikkou" src="{{ asset('img/jikkou.png') }}">
<p class="main15">ダイエット実行率ボタンを押してみるとダイエット実行率を円グラフで表しているグラフが表示されます。更にはこのページでダイエット開始時の体重、現在の体重、どれくらい体重が増減したのかをひと目で確認出来ます。</p>
<div id="step15">
 <img class="step15" src="{{ asset('img/step15.png') }}">
</div>
@endsection 

