@extends('layouts.app')

@section('content')
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
                    {{ __('You are logged in!') }}
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
