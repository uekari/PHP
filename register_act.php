<?php

// セッション開始
session_start();
include('functions.php');

// 今回はform内にrequiredを付けエラーを出しているため、下記条件分岐文は必要なし
// もし"username・password"がない、もしくは空だったらエラーメッセージを出す
// if (
//   !isset($_POST['username']) || $_POST['username'] == '' ||
//   !isset($_POST['password']) || $_POST['password'] == ''
// ) {
//   exit('paramError');
// }

$name = $_POST["name"];
$name2 = $_POST["name2"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$address_number = $_POST["address_number"];
$address = $_POST["address"];
$password = $_POST["password"];

// DB接続
$pdo = connect_to_db();

// sql取得
$sql = "INSERT INTO `register_table`(`name`,`name2`,`email`,`tel`,`address_number`,`address`,`password`,`is_admin`,`is_deleted`) VALUES(:name,:name2,:email,:tel,:address_number,:address,:password,0,0)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':name2', $name2, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR_CHAR);
$stmt->bindValue(':address_number', $address_number, PDO::PARAM_STR_CHAR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

if ($stmt->fetchColumn() > 0) {
  echo '<p>すでに登録されているユーザです．</p>';
  echo '<a href="login.php">login</a>';
  exit();
}

header("Location:login.php");
exit();

?>