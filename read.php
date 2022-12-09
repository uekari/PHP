<!-- 問い合わせ内容の処理＋管理画面 -->

<?php

// ① DB接続
$dbn ='mysql:dbname=gsf08_uekari;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}


// ② SQL作成&実行
$sql = 'SELECT click, namae, email, how1, how2 FROM form_table';
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// ③ SQL実行の処理
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


// 確認 OK
// echo "<pre>";
// var_dump($result);
// echo "</pre>";
// exit();

$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
      <td>{$record["click"]}</td>
      <td>{$record["namae"]}</td>
      <td>{$record["email"]}</td>
      <td>{$record["how1"]}</td>
      <td>{$record["how2"]}</td>
    </tr>
  ";
}


// データまとめ用の空文字変数
$str = "";

// ファイルを開く（読み取り専用:r）
$file = fopen('data/data.csv', 'r');

// ファイルをロック
flock($file, LOCK_EX);

// fgets()で1行ずつ取得→$lineに格納
// もし$fileがあったら・・・
if ($file) {
  // fgets(=データを取る)で$lineに入れる
  while ($line = fgets($file)) {
    // 取得したデータを`$str`に追加する(.は＋の意味)
    $str .="<tr><td>{$line}</td></tr>";
    // echo "$line";
  }
}

// ロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);


// `$str`に全てのデータ（タグに入った状態）がまとまるので，HTML内の任意の場所に表示する．

// var_dump($str);
// exit();

?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="read.css">
  <title>お客様からの問い合わせ内容</title>

</head>

<body>
  <fieldset>
    <h1>【管理画面】</h1>
    <p>★お客様からの問い合わせ内容</p>
    <table>
      <thead>
        <tr>
          <th><?=$str?></th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </fieldset>
</body>

</html>