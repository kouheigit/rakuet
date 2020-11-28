@extends('layouts.app4')
@section('body')
   <head>
       
       <meta charset="utf-8">
       <link rel="stylesheet" href="{{ asset('css/graph.css') }}">
       <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
       <div class="content">
           <canvas id="allChart"></canvas>
       </div>
       <script src="{{ mix('js/show_chart.js') }}"></script>
       <script type="text/javascript"> 
       id = 'allChart';
        labels = @json($keys);
	data = @json($counts);
         make_chart(id,labels,data);
       </script>
    <form action="graph" method="post">
      {{ csrf_field() }}
     <button class="previous" type='submit'name='graphatai'value='-10'>前の10件</button>
     <button class="next" type='submit'name='graphatai'value='10'>次の10件</button>
     <br>
  @if ($keys != null)
     <button class="gopies"type='submit' name='gopie'value='1'>ダイエット実行率を見る</button>
  @else
  @endif   
     <input type="hidden"name='graphswitch'value='ON'>
   </form>
   <p class="position">.</p>
   </body>
@endsection
