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
  ScrollReveal().reveal('.img2', { distance: '200px', origin: 'right', viewFactor: '0.8' });
  ScrollReveal().reveal('.img3', { distance: '200px', origin: 'left', viewFactor: '0.8' });
  ScrollReveal().reveal('.img4', { distance: '200px', origin: 'right', viewFactor: '0.8' });
  ScrollReveal().reveal('.img5', { distance: '200px', origin: 'left', viewFactor: '0.8' });
  ScrollReveal().reveal('.img7',{ duration: '3000',delay:'10'});
  ScrollReveal().reveal('.dai1',{ duration: '3000',delay:'10'});
  ScrollReveal().reveal('.text1',{ duration: '3000',delay:'20'});
  ScrollReveal().reveal('.text1m',{ duration: '3000',delay:'20'});
  ScrollReveal().reveal('.img6',{ duration: '3000'});
  ScrollReveal().reveal('.dai',{ duration: '1900'});
  ScrollReveal().reveal('.start',{ duration: '1900'});
  ScrollReveal().reveal('.mei',{ duration: '4000'});
  });
 </script>
 <header>
  <p class="speed">完全無料の健康管理ツール</p>
  <h2 class="speed1">楽エット</h2>
  <p class="dai">楽エット</p>
 </header>

  <img class="img6" src="{{ asset('img/fat.png') }}"alt="ダイエット前の人"title="ダイエット前の人">
  <img class="img7" src="{{ asset('img/happy.png') }}"alt="ダイエット成功"title="ダイエット成功">
  <img class="img1" src="{{ asset('img/index.png') }}">
  <img class="img2" src="{{ asset('img/index1.png') }}">
　<img class="img3" src="{{ asset('img/index2.png') }}">
  <img class="img4" src="{{ asset('img/index3.png') }}">
  <img class="img5" src="{{ asset('img/index4.png') }}">

  </div>
  <div id="setumei">
   <h1 class="dai">手軽にダイエット始めませんか?</h1>
    <p class="mei">楽エットは自分に合うダイエットが中々見つからない、<br>
 手軽にダイエットを始めたい方向けのサービスです。<br>プラン診断を受けるだけであなたに最適な
 ダイエットプランが<br>見つかります。まずはスタートボタンを押して無料登録から</p>
  <p class="meimobail">楽エットは自分に合うダイエットが中々見つからない、 手軽にダイエットを始めたい方向けのサービスです。プラン診断を受けるだけであなたに最適なダイエットプランが見つかります。まずはスタートボタンを押して無料登録から</p>
  </div>
  <div id="content">
   @yield('content')
  </div>
</body>
</html>

