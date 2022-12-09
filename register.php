<!-- 新規登録画面：表示 -->


<!-- 参考ページ 

● 郵便番号での住所自動入力に関して
https://www.webdesign-fan.com/ajaxzip3
● パスワードの表示非表示に関して
https://www.rectus.co.jp/archives/2940

-->

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="register.css">
  <!-- コンテンツ配信ネットワーク：CDN を使用(パスワード表示・非表示の切り替え) -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
  <title>新規登録画面</title>
  <!-- jsファイル読み込み -->
  <script src="register.js"></script>
  <!-- ライブラリ(郵便番号での住所自動入力)読み込み -->
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

</head>

<body>
  <form id="fieldPassword" action="register_act.php" method="POST">
    <fieldset>
      <legend>新規登録画面</legend>
      <div>
        <h1>お名前</h1>
        <input type="text" name="name" required>
      </div>
      <div>
        <h1>ふりがな</h1>
        <input type="text" name="name2">
      </div>
      <div>
        <h1>メールアドレス</h1>
        <input type="email" name="email" required>
      </div>
      <div>
        <h1>電話番号</h1>
        <input type="tel" name="tel" required>
      </div>
      <div>
        <h1>郵便番号</h1>
        <input type="text" name="address_number" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" required>
        <p>※ 半角・ハイフンなしでご入力ください。</p>
      </div>
      <div>
        <h1>ご住所</h1>
        <input type="text" name="address">
        <p>※ 町名・番地の入力漏れにご注意ください。</p>
      </div>
      <div>
        <h1>パスワード</h1>
        <input type="password" id="textPassword" name="password" minlength="6" required>
        <span id="buttonEye" class="fa fa-eye" onclick="pushHideButton()"></span>
        <p>※ 6文字以上でご入力ください。</p>
      </div>
      <div>
        <h1>パスワード(確認)</h1>
        <input type="password" name="re_password" minlength="6" equired>
        <p>( 確認のため、もう一度ご入力ください )</p>
      </div>
      
      <div class="button">
        <input type="submit" value="確認画面へ" class="btn">
      </div>

      <a href="login.php">ログイン画面へ</a>
    </fieldset>
  </form>


</body>
</html>