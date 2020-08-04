@extends('layouts.app')

@section('content')
<!--CSS軽量ファイルを読み込む-->
<link rel="stylesheet" href="https://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
<link rel="stylesheet" href="https://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
<!--jsファイルを読み込む-->
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
		    <p>ようこそラックエットへ</p>
                    <p>ようこそラックエットへ</p>
                     <p>ようこそラックエットへ</p>
		      <p>ようこそラックエットへ</p>
		      <p>ここの中の枠組みの大きさは文章によって変化します</p>
                      {{ Auth::user()->name }} 
                      {{ Auth::user()->email }}
		    {{ __('You are logged in!') }}
                   <form action="home2" method="post">
                     {{ csrf_field() }}
                     <button class="start" type='submit' name='start' value='1'>体重管理シートを作成する</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--js-->
<script type="text/javascript">
$(function(){
        ScrollReveal().reveal('.card', { distance: '200px', origin: 'right', viewFactor: '0.8' });
});
</script>
@endsection
