<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.css">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

</head>
<body>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.js"></script>
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

