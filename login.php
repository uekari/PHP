<!-- ログイン画面：表示 -->

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
</head>

<body>
  <form action="login_act.php" method="POST">
    <fieldset>
      <legend>ログイン画面</legend>
      <div>
        メールアドレス: <input type="email" name="email">
      </div>
      <div>
        パスワード: <input type="password" name="password">
      </div>
      <div>
        <button>Login</button>
      </div>
      <a href="register.php">新規登録</a>
    </fieldset>
  </form>

</body>

</html>