@extends('layouts1.about')

@section('content')
<!--CSS軽量ファイルを読み込む-->
<link rel="stylesheet" href="https://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
<link rel="stylesheet" href="https://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
<!--cssファイル-->
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<!--このファイル専門のCSS-->
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
		    @yield('body') 
                </div>
            </div>
        </div>
    </div>
</div>
<p class="test">.</p>
@component('components.menu')
@endcomponent

<!--end-->
<!--js-->
<script type="text/javascript">
$(function(){
 if (navigator.userAgent.match(/iPhone|Android.+Mobile/)) {
 }else{
/*
	ScrollReveal().reveal('.card', { distance: '200px', origin: 'right', viewFactor: '0.8' });
	ScrollReveal().reveal('.menubar', { duration: 1600, origin: 'bottom', distance: '50px',reset: true });
 }*/
});
</script>
@endsection
