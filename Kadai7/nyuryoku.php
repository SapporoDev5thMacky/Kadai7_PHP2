
<?php 
session_start();
include('funcs.php');//別の階層にfuncs.phpがある場合は「betukaisou/funcs.php」などパスを変えてincludesする
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>

</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="chartjs.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
  <fieldset>
                <legend>決算結果入力</legend>
                <label>年度：<input type="number" name="year"></label><br>
                <label>総収益(百万円単位）：<input type="number" name="revenue"></label><br>
                <label>総資産(百万円単位）：<input type="number" name="asset"></label><br>
                <label>負債(百万円単位）：<input type="number" name="liab"></label><br>
                <input type="submit" value="送信">
            </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>