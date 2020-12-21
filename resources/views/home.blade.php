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
		  <p class="datetoday">{{$datetoday ?? ''}}</p>
		   <img class="gazou" src="{{$gazou}}">
                 <!-- <p>{{$datetoday ?? ''}}</p>-->
		  <div id="moji">
		   <h1>{{$name}}さんのボディデータ</h1>
                   <h2>{{$name}}さんの現在の体重は{{$weight}}</h2>
		   <h2>{{$name}}さんのBMIは{{$BMI}}</h2>
		   <!--元あった場所-->
		   <h2>{{$setumei}}</h2>
		   <h2>{{$name}}さんの基礎代謝量は{{$BMR}}</h2>
                   <p class="mei">{{$himan}}</p>
		 </div>
　　　　　　　　@if ($hantei ?? '' != '')
		<p class="kisosetu">基礎代謝とは何もしないで過ごしていても消費するカロリー数の事です、極端に言うと一日寝ていただけでも消費されるカロリーの事を言います。{{$name ?? ''}}さんの基礎代謝は{{$BMR1 ?? ''}}kcalになります。{{$name ?? ''}}さんの生活スタイルの運動量が多い生活例えば通勤まで１時間以上とか自転車通勤(片道)であれば{{$BMR1 ?? ''}}kcalに＋300kcalの{{$BMR2 ?? ''}}kcalの運動量が少ない生活であれば{{$BMR1 ?? ''}}kcalに＋100kcalの{{$BMR3 ?? ''}}kcalが一日の{{$name ?? ''}}さんの消費カロリーとなります。またスポーツなどを行った際にはそのカロリーも換算して計算しましょう</p>
		 @else
	         <p></p>
                @endif
                <div id="homeform">
                 @component('components.homeform')
		 @endcomponent
		</div>  
		 <img class="swim" src="{{ asset('img/swimming.png') }}">
		  <p class="sport">水泳の1時間あたりの消費カロリー:700kcal</p>
　               <img class="cycle" src="{{ asset('img/cycle.png') }}">
		  <p class="sport1">サイクリング1時間あたりの消費カロリー:300kcal</p>
                    <img class="running" src="{{ asset('img/running.png') }}">
		  <p class="sport2">ランニング30分あたりの消費カロリー:280kcal</p>
                  <img class="working" src="{{ asset('img/working.png') }}">
		  <p class="sport3">ウォーキング1時間あたりの消費カロリー:220kcal</p>
　　　　　　　　　<img class="kaji" src="{{ asset('img/kaji.png') }}">
		  <p class="sport4">家事1時間あたりの消費カロリー:80kcal</p>
                  <img class="kick" src="{{ asset('img/kick.png') }}">
		  <p class="sport5">キックボクシング1時間あたりの消費カロリー:500kcal</p>
               <div id="dell">
                  @component('components.dell')
		  @endcomponent
	       </div>
		  <p class="boxtest"></p>
                  
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
	ScrollReveal().reveal('.menubar', { duration: 1600, origin: 'bottom', distance: '50px',reset: true });
 }
});
</script>
@endsection
