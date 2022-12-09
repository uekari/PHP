<!-- ログインの処理：非表示(＋エラー時の表示) -->

<?php

// セッション開始
session_start();
include('functions.php');

// データ受け取り
$email = $_POST['email'];
$password = $_POST['password'];

// DB接続
$pdo = connect_to_db();

// SQL実行
// email，password，is_deletedの3項目全てを満たすデータを抽出する．
$sql = 'SELECT * FROM register_table WHERE email=:email AND password=:password AND is_deleted=0';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
}
catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}


// ユーザの有無で条件分岐
$val = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$val) {
    // 失敗した時
    echo "<p>ログイン情報に誤りがあります</p>";
    // echo "<a href=login.php>ログイン</a>";
    exit();
} 
else {
    // 成功した時
    $_SESSION = array();
    $_SESSION['session_id'] = session_id();
    $_SESSION['is_admin'] = $val['is_admin'];
    $_SESSION['email'] = $val['email'];
    $_SESSION['name'] = $val['name'];
    header("Location:top2.php");
    exit();
}

?>