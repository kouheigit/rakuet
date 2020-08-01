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
  });
 </script>
 <header>
  <p class="speed">完全無料の健康管理ツール</p>
  <h2 class="speed1">楽エット</h2>
 </header>
 <!--カルーセルパネル用の読み込み-->
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img class="logo" src="{{ asset('img/test.jpeg') }}" width="700" height="400">
    </div>
      <div class="swiper-slide"><img class="logo" src="{{ asset('img/test2.jpeg') }}" width="700" height="400">
     </div>
      <div class="swiper-slide"><img class="logo" src="{{ asset('img/test3.jpeg') }}" width="700" height="400">
    </div>
    <div class="swiper-slide"><img class="logo" src="{{ asset('img/test6.jpg') }}" width="700" height="400">
    </div>
    <div class="swiper-slide"><img class="logo" src="{{ asset('img/test5.jpg') }}" width="700" height="400">
    </div>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
 <!--カルーセルパネル用jquery-->
 <script>
var swiper = new Swiper('.swiper-container', {
      // ここからはオプションです。
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  }
});
</script>
  </div>
  <div id="content">
   @yield('content')
  </div>
</body>
</html>

