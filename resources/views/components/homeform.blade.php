<link rel="stylesheet" href="{{ asset('css/homeform.css') }}">
<p class="homedai">{{ Auth::user()->name }}さんようこそラックエットへ</p>
<!--     {{ Auth::user()->email }}-->
<form action="home" method="post">
    {{ csrf_field() }}
  <button class="start" type='submit' name='start' value='{{ Auth::user()->email }}'>体重管理シートを作成する</button>
</form>
<form action="home" method="post">
   {{csrf_field() }}
<button class="change" type='submit' name='change' value='{{ Auth::user()->email }}'>体重管理シートを変更する</button>
</form>
<!--
<form action="home2" method="post">
      {{ csrf_field() }}
   <button class="dell" type='submit' name='dell' value='{{ Auth::user()->email }}'>体重管理シートを削除する</button>
</form>-->
