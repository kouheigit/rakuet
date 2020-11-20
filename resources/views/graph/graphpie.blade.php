@extends('layouts.app4')
@section('body')
   <head> 
       <meta charset="utf-8">
       <link rel="stylesheet" href="{{ asset('css/graph.css') }}">
       <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
   <h1 class="title">{{$name}}さんのダイエット実行率</h1>
    <!--graph.blade.phpでは一切反映されず、graph1.blade.phpが共通して反映される-->
    <!--Controller post部分未完成-->
       <div class="content">
           <canvas id="allChart"></canvas>
       </div>
       <script src="{{ mix('js/pie_chart.js') }}"></script>
       <script type="text/javascript"> 
       id = 'allChart';
        labels = @json($keys);
	data = @json($counts);
         make_chart(id,labels,data);
       </script>
    <h1 class="complete">現在の実行率は{{$tasseiti}}%</h1>
    <h1 class="incomplete">未実行の割合は{{$mijikko}}%</h1>
    <p class="explain">この円グラフはダイエット開始時から現在までの{{$name}}さんのダイエット実行率を円グラフとして表しています。</p>
   <p class="position">.</p>
   </body>
@endsection
