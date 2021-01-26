<?php
// var_dump($_POST);
// exit();

session_start();
include("functions.php");
check_session_id();

// 受け取ったデータを変数に入れる
$id = $_POST['id'];
$current_weight = $_POST['current_weight'];

include('functions.php');
$pdo = connect_to_db();

// データ登録SQL作成
// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
$sql = 'UPDATE cattle_memo SET current_weight=:current_weight, updated_date=sysdate() WHERE id=:id';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':current_weight', $current_weight, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();

// データ登録処理後
// if ($status == false) {
//   // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
//   $error = $stmt->errorInfo();
//   echo json_encode(["error_msg" => "{$error[2]}"]);
//   exit();
// } else {
//   // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
//   header("Location:edit.php?id=$id");
  // exit();
// }
?>

<?php
// var_dump($_POST);
// exit();

// 受け取ったデータを変数に変換
$cattle_id = $_POST['id'];
$current_weight = $_POST['current_weight'];

include('functions.php');
$pdo = connect_to_db();

//SQL作成&実行
$sql = 'INSERT INTO cattle_weight(id, cattle_id, current_weight, updated_date) VALUES(NULL, :cattle_id, :current_weight, sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':cattle_id', $cattle_id, PDO::PARAM_INT);
$stmt->bindValue(':current_weight', $current_weight, PDO::PARAM_INT);

$status = $stmt->execute(); // SQLを実行

if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  header("Location:edit.php?id=$cattle_id");
  exit();
}

  ?>