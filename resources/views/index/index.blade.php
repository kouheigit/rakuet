@extends('index.indexlayout')

@section('content')
<!--ボタンの送信先のポストの作成とレイダイレクトするサイト先の設定、ボタンの装飾のミリグラムとニコラスのリンクが読み込めない-->
<h1>test</h1>
<form action="index" method="post">
  <button type='submit' name='action' value='add'>追加</button>
</form>

@endsection
