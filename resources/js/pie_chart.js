import 'chart.js';

window.make_chart = function make_chart(id, labels, data)
{
   var ctx = document.getElementById(id).getContext('2d');
   var myChart = new Chart(ctx, {
       type: 'pie',
       data: {
           labels: labels,
           datasets: [{
               label: '体重グラフ',
               data: data,
               backgroundColor: [
                   'rgba(255, 99, 132, 0.2)',
                   'rgba(54, 162, 235, 0.2)',
                   'rgba(255, 206, 86, 0.2)',
                   'rgba(75, 192, 192, 0.2)',
                   'rgba(153, 102, 255, 0.2)',
                   'rgba(255, 159, 64, 0.2)'
               ],
               borderColor:'rgba(255, 28, 28)',
               borderWidth: 1
           }]
       },
       options: {
       }
   });
};
