<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login.css">
  <link rel="icon" href="../img/icon.ico">
  <title>牛さんメモ</title>
</head>
<body>
  <div class="top_main">
    <img class="icon" src="../img/icon.png" alt="牛さんのアイコン">
    <h2>牛さんメモ</h2>
    <h3>ログインページ</h3>
    <form class="login_main" action="login_act.php" method="POST">
      <fieldset>
        <ul class="index">
          <li>ユーザー名: <input type="text" name="username"></li>
          <li>パスワード: <input type="password" name="password"></li>
          <button class="login_btn">ログイン</button>
          <p>・・・</p>
          <div class="register_btn"><a href="register.php">新規登録</a></div>
          <p>※初めてご利用の方は新規登録から</p>
        </ul>
      </fieldset>
    </form>
  </div>
</body>
</html>