@extends('layouts.apphome')

@section('body')
@component('components.hensyu')
@endcomponent
<form action="home2" method="post">
 {{csrf_field() }}
<!--<button class="home2dell" name="dell" value="1" type='submit'>会員データ削除ページへ</button>-->
</form>
@endsection

