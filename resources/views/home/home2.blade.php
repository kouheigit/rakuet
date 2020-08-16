@extends('layouts.apphome')

@section('body')
<h1>ここの箇所にボディーデータなどを入力して登録する画面を作る</h1>
<form action="home2" method="post">
 {{csrf_field() }}
<button class="dell" type='submit' name="dell" value=''>会員データ削除画面へ</button>
</form>
@endsection

