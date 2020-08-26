@extends('layouts.app')

@section('content')
<!--CSS軽量ファイルを読み込む-->
<link rel="stylesheet" href="https://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
<link rel="stylesheet" href="https://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
<!--cssファイル-->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<!--jsファイルを読み込む-->
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="card">
                <div class="card-header">{{ __('Welcome to rakuet') }}</div>
		  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                             {{ session('status') }}
                        </div>
		@endif
		   <img class="gazou" src="{{$gazou}}">
                  <div id="moji">
		   <h1>{{$name}}さんのボディデータ</h1>
                   <h2>{{$name}}さんの現在の体重は{{$weight}}</h2>
		   <h2>{{$name}}さんのBMIは{{$BMI}}</h2>
		   <h2>{{$name}}さん{{$himan}}</h2>
                   <h2>{{$setumei}}</h2>
		   <h2>{{$name}}さんの基礎代謝量は{{$BMR}}</h2>
		 </div> 
		    @component('components.homeform')
                    @endcomponent     
                </div>
            </div>
        </div>
    </div>
</div>
<p class="test">test</p>
<div id="button">
@component('components.menu')
@endcomponent
</div>

<!--end-->
<!--js-->
<script type="text/javascript">
$(function(){
 if (navigator.userAgent.match(/iPhone|Android.+Mobile/)) {
 }else{
	ScrollReveal().reveal('.card', { distance: '200px', origin: 'right', viewFactor: '0.8' });
	ScrollReveal().reveal('.menubar', { duration: 1600, origin: 'bottom', distance: '50px',reset: true });
 }
});
</script>
@endsection
