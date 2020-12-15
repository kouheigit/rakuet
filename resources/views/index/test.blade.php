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

