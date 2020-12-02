@extends('layouts.app4')
@section('body')
<h1>{{$pass}}</h1>
 <form action="chargeauth" method="POST">
           {{ csrf_field() }}
     <input type="hidden" name="paidauth"value=1>
     <button class="sindan1" type='submit'>このダイエット方法を見る</button>
 </form>
@endsection
