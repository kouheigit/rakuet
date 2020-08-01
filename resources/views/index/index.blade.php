@extends('index.indexlayout')

@section('content')

<form action="index2" method="post">
{{ csrf_field() }}
  <button class="start" type='submit' name='start' value='start'>スタートする</button>
</form>

@endsection
