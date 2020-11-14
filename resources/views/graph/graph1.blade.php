@extends('layouts.app4')
@section('body')
   <head>
       
       <meta charset="utf-8">
       <link rel="stylesheet" href="{{ asset('css/graph.css') }}">
       <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
  <h1>{{$newcountnumber}}</h1>
  <h1>{{$countnumber}}</h1>
  <h1>{{$testcode}}<h1>
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
   </body>
   <h1>これはテストです</h1>
@endsection
