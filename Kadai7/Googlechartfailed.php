<?php

$connection = mysqli_connect("localhost", "root", "", "gs_db");

$result = mysqli_query($connection, "SELECT * FROM gs_bm_table");
// if($result){
//   echo "CONNECTED";
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>決算推移グラフ</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['year', 'revenue', 'asset','liab'],

          <?php
          if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result)){

              echo"['".$row['year']."', '".$row['revenue']."','".$row['asset']."','".$row['liab']."'],";
            }
          }

?>

        ]);

        var options = {
          chart: {
            title: 'Company Performance',
         
            bars: 'vertical',
          vAxis: {format: 'decimal'},
          height: 400,
          colors: ['#1b9e77', '#d95f02', '#7570b3']
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
  </body>
</html>






















