<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.css">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

<link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
</head>
<body>
 <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
  <script src="https://unpkg.com/scrollreveal"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.js"></script>
 <!--ヘッダー-->
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
</body>
</html>

