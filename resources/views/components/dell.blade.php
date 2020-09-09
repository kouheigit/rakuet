<link rel="stylesheet" href="{{ asset('css/homeform.css') }}">
<form action="home" method="post">
   {{csrf_field() }}
<button class="dell" type='submit' name='dells' value='1'>会員データを削除する</button>
</form>

