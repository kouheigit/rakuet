@extends('layouts.app4')
@section('body')
<link rel="stylesheet" href="{{ asset('css/paid.css') }}">
@foreach ($plans as $plan)
 <div id="stripe">
 <div class="stripe1">
  <div class="stripe2">
   <form action="chargeauth" method="POST">
    {{ csrf_field() }}
  <tr>
    <td>
       <p class="title">{{$plan->title}}</p>
       <input type="hidden" name="paidauth"value={{$plan->id}}>
       <button class="sindan1" type='submit'>このダイエット方法を見る</button>
    </td>
 </tr> 
   </form>
  </div>
 </div>
</div>
@endforeach
<!-- <h1>{{$pass}}</h1>-->
@endsection
