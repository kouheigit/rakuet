@extends('layouts.app4')
@section('body')
<link rel="stylesheet" href="{{ asset('css/paid.css') }}">
@foreach ($plans as $plan)
 <div id="stripe">
 <div class="stripe1">
  <div class="stripe2">
  <tr>
    <td>{{$plan->id}}</td>
    <td>{{$plan->title}}</td>
 </tr>
 <h1>{{$pass}}</h1>
   <form action="chargeauth" method="POST">
      {{ csrf_field() }}    
     <input type="hidden" name="paidauth"value=1>
     <button class="sindan1" type='submit'>このダイエット方法を見る</button>
   </form>
  </div>
 </div>
</div>
@endforeach

@foreach ($plans as $plan)
<tr>
  <td>{{$plan->id}}</td>
  <td>{{$plan->title}}</td>
  <br>
</tr>
<br>
@endforeach
@endsection
