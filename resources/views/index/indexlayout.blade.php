<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<!--軽量CSSフレームワーク（デザイン)ファイルの読み込み-->
<link rel="stylesheet" href="https://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
<link rel="stylesheet" href="https://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
<!--カルーセルパネル用読み込みcss下記bodyの読み込みファイルと本ファイル二つ必要-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.css">
<!--cssのファイルを読み込む-->
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<!--googleフォントを読み込む-->
<link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!--title&metaタグ-->
<title>楽エット|完全無料の健康管理ツール</title>
<meta property="og:title" content="楽エット|完全無料の健康管理ツール">
<meta name="description" content="楽エットは無理なダイエットや体に負荷をかけたくない人のためのダイエットツールになります。ご自身のボディデータを入力後プラン診断であなたにピッタリなダイエット方法を提案、体重管理のサポートなどあなたのダイエット成功をサポートします。"/>
<meta name="keywords" content="ダイエットツール,ダイエットプラン診断,楽エット,楽なダイエット,健康管理ツール,ダイエットサポート,ダイエットプラン,プラン診断"/>
</head>
<body>
<!--文字用jsファイルの読み込み-->
 <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
  <script src="https://unpkg.com/scrollreveal"></script>
<!--スワイプ用jsファイルの読み込み-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.js"></script>
 <!--ヘッダーの文字用の効果のためのjavascriptファイル-->
 <script type="text/javascript">
$(function(){
  ScrollReveal().reveal('.speed', { distance: '200px', origin: 'left', viewFactor: '0.8' });
  ScrollReveal().reveal('.speed1', { duration: '1800' ,delay: '1000'} );
   ScrollReveal().reveal('.dai2', { distance: '200px', origin: 'left', viewFactor: '0.3' });
  ScrollReveal().reveal('.img7',{ duration: '3000',delay:'10'});
  ScrollReveal().reveal('.dai1',{ duration: '3000',delay:'10'});
  ScrollReveal().reveal('.dai2',{ duration: '3000',delay:'10'});
  ScrollReveal().reveal('.dai3',{ duration: '3000',delay:'10'});
  ScrollReveal().reveal('.text1',{ duration: '3000',delay:'20'});
  ScrollReveal().reveal('.text1m',{ duration: '3000',delay:'20'});
   ScrollReveal().reveal('.text2',{ duration: '3000',delay:'20'});
  ScrollReveal().reveal('.text2m',{ duration: '3000',delay:'20'});
   ScrollReveal().reveal('.text3',{ duration: '3000',delay:'20'});
  ScrollReveal().reveal('.text3m',{ duration: '3000',delay:'20'});
  ScrollReveal().reveal('.img3',{ duration: '3000'});
  ScrollReveal().reveal('.img4',{ duration: '3000'});
  ScrollReveal().reveal('.img5',{ duration: '3000'});
  ScrollReveal().reveal('.img6',{ duration: '3000'});
  ScrollReveal().reveal('.dai',{ duration: '1900'});
  ScrollReveal().reveal('.start',{ duration: '1900'});
  ScrollReveal().reveal('.mei',{ duration: '4000'});
  });
 </script>
 <header>
  <p class="speed">完全無料の健康管理ツール</p>
  <h2 class="speed1">楽エット</h2>
 </header>

  
  <!--<img class="img1" src="../../img/index.png"　>-->
 
  <div id="setumei">
    <div class="setsumei-text">
     <img class="img6" src="{{ asset('img/fat.png') }}"alt="ダイエット前の人"title="ダイエット前の人">
     <img class="img7" src="{{ asset('img/happy.png') }}"alt="ダイエット成功"title="ダイエット成功">
      <h2 class="dai2">手軽にダイエット始めませんか?</h2>
      <p class="mei">楽エットは自分に合うダイエットが中々見つからない、<br class="pc-only">手軽にダイエットを始めたい方向けのサービスです。<br class="pc-only">プラン診断を受けるだけであなたに最適な ダイエットプランが<br class="pc-only">見つかります。まずはスタートボタンを押して無料登録から</p>
      <form action="index2" method="post">
          {{ csrf_field() }}
         <button class="start" type='submit' name='start' value='start'>スタートする</button>
      </form>
    </div>
  </div>

  <div class="about">
     <img class="img2" src="{{ asset('img/index1.png') }}">
    <div class="about-text">
      <h2 class="dai2">身体情報を入力するだけでダイエットに必要<br class="pc-only">なカロリー数やBMIなどを割り出します。</h2>
      <p class="text1">身長、体重、年齢、性別の四項目を入力するとその値をもとにダイエットに必要な消費カロリーやBMIなどを割り出します</p>
    </div>
  </div>

  <div class="routine">
    <h2 class="dai2">理想的なダイエットルーチンを<br class="sp-only">築きましょう!!!</h2>
     　<img class="img3" src="{{ asset('img/index2.png') }}">

  </div>

  <div class="plan">
    <img class="img4" src="{{ asset('img/index3.png') }}">
    <div class="plan-text">
      <h2 class="dai2">あなたにピッタリなダイエットプランを提案します</h2>
      <p class="text2">ダイエットを実行する期間やどのようなダイエットが<br class="pc-only">理想的なダイエットプランなのかをプラン診断を通して<br class="pc-only">あなたにピッタリなダイエットプランを提案します。</p>
    </div>
  </div>

  <div class="function">
    <h2 class="dai2 func-h1">体重の推移とダイエット実行率が<br>ひとめでわかるグラフ機能</h2>
      <img class="img5" src="{{ asset('img/index4.png') }}">
    <p class="text3 func-text">毎日の体重の推移とどれくらいダイエットを<br class="pc-only">実行できているかをわかりやすい線グラフ<br class="pc-only">円グラフで表示します</p>
  </div>

  <!--<div id="content">
   @yield('content')
  </div>-->
</body>
</html>

