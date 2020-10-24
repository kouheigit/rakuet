@extends('layouts.app3')
@section('body')
<title>chart</title>
<link rel="stylesheet" href="{{ asset('css/graph.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
</head>
<body>
<h1>宮本天外</h1>
<canvas id="myChart"></canvas>
<script>
$(function(){
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type:'doughnut',
  data: {
    labels: ['b', 'B', '2', '5', 'E', 'F', 'G'],
    datasets: [{

      label: 'label',
      data: [3, 18, 6, 10, 12, 7, 12],
      backgroundColor: "rgba(255,153,0,0.4)"
    }]
  }
});
});
</script>
</body>
@endsection

