<?php

/**
 * 1. nyuryoku.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. nyuryoku.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
$year = $_POST['year'];
$revenue = $_POST['revenue'];
$asset = $_POST['asset'];
$liab = $_POST['liab'];

// nyuryokuphpと整合性チェック
// <label>年度：<input type="number" name="year"></label><br>
// <label>総収益：<input type="number" name="revenue"></label><br>
// <label>総資産：<input type="number" name="asset"></label><br>
// <label>負債：<input type="number" name="liab"></label><br>

// 前回まではopen-write-close
// 今回は接続するー登録BLOCKー登録した後に


//2. DB接続します,基本ここはCopy&PasteCopy&Paste
try {
  //ID:'root', Password: xamppは 空白 ''
  // catchはエラー、exitは対処方法
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成

// 1. SQL文を用意(授業の前半でやったとおり、ただし:が必要)
$stmt = $pdo->prepare("INSERT INTO 
gs_bm_table(id, year,revenue,asset,liab)
VALUES(NULL, :year, :revenue, :asset, :liab)");

//  2. バインド変数を用意 SQLインジェクション
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':year', $year,PDO::PARAM_STR);
$stmt->bindValue(':revenue', $revenue,PDO::PARAM_STR);
$stmt->bindValue(':asset', $asset,PDO::PARAM_STR);
$stmt->bindValue(':liab', $liab,PDO::PARAM_STR);
// $stmt->bindValue('******', *****, ****************);
// $stmt->bindValue('******', *****, ****************);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後 以下はTemplate
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  //５．nyuryoku.phpへリダイレクト
  header('Location: nyuryoku.php');

}
?>
