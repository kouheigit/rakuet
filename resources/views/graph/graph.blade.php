@extends('layouts.app3')
@section('body')
<title>chart</title>
<link rel="stylesheet" href="{{ asset('css/graph.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
</head>
<body>
<h1>宮本天外</h1>
@foreach ($syamu2 as $syamu3)
<h1>{{$syamu3}}</h1>

<canvas id="myChart"></canvas>
<script>
$(function(){
//laravelの配列からjavascriptに渡す
var array = "{{ json_encode($syamu2) }}";
var set = [2,4,9,6,5,43,2,1]
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type:'doughnut',
  data: {
    labels: ['{{$syamu}}','2', '5', 'E', 'F', 'G'],
    datasets: [{
    label: 'label',
      data:array,
      backgroundColor: ['red','blue','yellow','green','silver','gold','pink']
    }]
  }
});
});
</script>
@endforeach
</body>
@endsection

