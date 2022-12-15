<?php
// クロスサイトスクリプティング
// htmlspecialcharsは、画面に描写するところでScriptをただの文字に変えてくれる
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}



//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成して実行する
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table;");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //elseの中は、SQL実行が成功した場合
  // Selectデータの数だけ自動でループしてくれる
  // 1行とったらResultに格納を繰り返し
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    // 表から1行とったら配列でViewに格納,,,  .=がないと上書きされてしまう
    // Pタグがないとただ並ぶだけ<p>をつける
    // $view .= '<p>' . $result['name'] . '</p>';

     // Pタグがないとただ並ぶだけ<p>をつける
    //  <!-- h関数ー一番上で定義したもの -->
    $view .= '<p>' . $result['id'] . ' : ' . h($result['year']) . ' / ' . h($result['revenue']) . ' / ' . h($result['asset']) . ' / '. h($result['liab']) .'</p>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

<div>
  
    <div class="container jumbotron"><?= $view ?></div>
</div>
<!-- Main[End] -->

</body>
</html>
