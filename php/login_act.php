<?php
session_start();
include('functions.php');   // 関数ファイル読み込み
$pdo = connect_to_db();       // DB接続
$username = $_POST['username']; // データ受け取り→変数に入れる
$password = $_POST['password'];

// DBにデータがあるかどうか検索
$sql = 'SELECT * FROM users_table WHERE username = :username AND password = :password
AND is_deleted = 0';
// WHEREで条件を指定!

$stmt = $pdo->prepare($sql);
$stmt -> bindValue(':username', $username, PDO::PARAM_STR);
$stmt -> bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt -> execute();

// DBのデータ有無で条件分岐
$val = $stmt->fetch(PDO::FETCH_ASSOC);  // 該当レコードだけ取得
if (!$val) {                            // 該当データがないときはログインページへのリンクを表示
  echo "<p>ログイン情報に誤りがあります.</p>";
  echo '<a href="login.php">ログインページに戻る</a>';
  exit();
} else {
  $_SESSION = array(); // セッション変数を空にする
  $_SESSION["session_id"] = session_id();
  $_SESSION["is_admin"] = $val["is_admin"];
  $_SESSION["username"] = $val["username"];
  header("Location:index.php"); // 一覧ページへ移動
  exit();
  }