<?php 
include('funcs.php');

//2. DB接続します
$pdo = db_connect();
$year = '';
$revenue = '';
$asset = '';
$liab = '';
//2．データ登録SQL作成
//prepare("")の中にはmysqlのSQLで入力したINSERT文を入れて修正すれば良いイメージ
$stmt = $pdo->prepare("SELECT* FROM gs_bm_table");
$status = $stmt->execute();

//loop through the returned data
while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){
    $year = $year . '"'. $r['year'].'",';
    $revenue = $revenue . '"'. $r['revenue'] .'",';
    $asset = $asset . '"'. $r['asset'] .'",';
    $liab = $liab . '"'. $r['liab'] .'",';
}
// 文字列の先頭と末尾から余計な空白を取り除く(参考Webにあったが無くても動く)
// $year = trim($year,",");
// $revenue = trim($revenue,",");
// $asset = trim($asset,",");
// $liab = trim($liab,",");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>決算推移グラフ</title>
</head>
<body>
<div class="chartBox">
  <canvas id="myChart"></canvas>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
   
    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo $year ?>],//各棒の名前（name)
            // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'ほげ'],//各棒の名前（name)
            datasets: [{
              label: 'total revenue',
        data:  [<?php echo $revenue ?>],
        backgroundColor:'rgba(54,162,235,0.2)',
        borderWidth: 1
    }, {
        label: 'total asset',
        data: [<?php echo $asset ?>],
        backgroundColor:'rgba(255,99,132,0.2)',
        borderWidth: 1
      },{
        label: 'liability',
        data: [<?php echo $liab ?>],
        backgroundColor:'rgba(75,192,192,0.2)',
        borderWidth: 1
                
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>
</body>
</html>




















