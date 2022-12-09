<?php

// ① 確認 ok
// var_dump($_POST);
// exit();


// ②入力チェック
// 今回は、formにrequired付けて対応したからいらない
// if(
//     !isset($_POST["namae"]) || $_POST["namae"] === "" ||
//     !isset($_POST["email"]) || $_POST["email"] === "" ||
//     !isset($_POST["how2"]) || $_POST["how2"] === ""
// ){
//     exit("必須項目を入力してください！");
// }
// // それ以外は下記に画面遷移
// else {
//     header("Location:php_create02.php");
// }


// ③ データの受け取り
$namae = $_POST["namae"];
$email = $_POST["email"];
// $tel = $_POST["tel"];
// $address = $_POST["address"];
$how1 = $_POST["how1"];
$how2 = $_POST["how2"];
$click = $_POST["click"];



// データを1行にまとめる(最後に改行を入れ忘れないこと！)
$write_data = "＊ {$namae} / {$email} / {$how1} / {$how2}\n";

// ファイルを開く:fopen("開きたいファイル","a")
// a に関しては、資料参照
$file = fopen("data.csv", "a");

// 他の人が書き込めないように、ファイルをロックする
flock($file,LOCK_EX);

// 指定したファイルに、指定したデータを書き込む
fwrite($file,$write_data);

// ファイルのロックを解除する
flock($file,LOCK_UN);
// ファイルを閉じる
fclose($file);


// ④ DB接続

$dbn ='mysql:dbname=gsf08_uekari;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
    $pdo = new PDO($dbn, $user, $pwd);
} 
catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}
// 「dbError:...」が表示されたらdb接続でエラーが発生している


// ⑤ SQL作成
// ・sqlは自分で書く(バインド変数を使って置いておく)
$sql = 'INSERT INTO form_table (click, namae, email, how1, how2) VALUES (now(), :namae, :email, :how1, :how2)';

$stmt = $pdo->prepare($sql);

// ・バインド変数(:〜)を設定
$stmt->bindValue(':namae', $namae, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':how1', $how1, PDO::PARAM_STR);
$stmt->bindValue(':how2', $how2, PDO::PARAM_STR);


// ⑥ SQL実行
try {
    $status = $stmt->execute();
} 
catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}



// メール自動送信機能
// 送信ボタンが押されたら・・・
    if (isset($_POST["submit"])) {
        // 送信ボタンが押された時に動作する処理をここに記述する
        // 日本語をメールで送る場合の設定
            mb_language("ja");
            mb_internal_encoding("UTF-8");
        
        //メール送信を行う

            // 件名を変数subjectに格納
            $subject = "［自動送信］お問い合わせ内容の確認";

            // メール本文を変数bodyに格納
        $body = <<< EOM

        {$namae}様

            お問い合わせありがとうございます。
            以下のお問い合わせ内容を、メールにて確認させていただきました。

        ===================================================

        【 お名前 】 
            {$namae}

        【 メール 】 
            {$email}

        【 お問い合わせ項目 】 
            {$how1}

        【 内容 】 
            {$how2}

        ===================================================

            内容を確認のうえ、回答させて頂きます。
            しばらくお待ちください。
        EOM;
        
        // 送信元のメールアドレスを変数fromEmailに格納
        $fromEmail = "hrkr0472@gmail.com";

        // 送信元の名前を変数fromNameに格納
        $fromName = "G`s_LAB08_うえかり";

        // ヘッダ情報を変数headerに格納する      
        $header = "From: " .mb_encode_mimeheader($fromName) ."<{$fromEmail}>";

        // メール送信を行う
        mb_send_mail($email, $subject, $body, $header);

        // サンクスページに画面遷移させる
        header("Location: endpage.php");
        exit;
    }


?>


<html lang="ja">

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="create.css">
<title>確認画面</title>
</head>

<body>

<div>

<h1 class="contact-title">お問い合わせの内容確認</h1>
    <div class="img">
        <img src="img/BlueStarbouquet.png">
    </div>
    <p>お問い合わせ内容に変更がなければ<br>「送信する」ボタンを押して下さい。</p>

    <form action="read.php" method="POST">
        <!-- 表示したくないvalueのデータを隠す -->
            <input type="hidden" name="namae" value="<?php echo $namae; ?>">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <input type="hidden" name="how1" value="<?php echo $how1; ?>">
            <input type="hidden" name="how2" value="<?php echo $how2; ?>">
            
            <div class="center">
                <div>
                    <h2>お名前</h2>
                    <p><?php echo $namae; ?></p>
                </div>
                <div>
                    <h2>メールアドレス</h2>
                    <p><?php echo $email; ?></p>
                </div>
                <div>
                    <h2>お問い合わせ項目</h2>
                    <p><?php echo $how1; ?></p>
                </div>
                <div>
                    <h2>お問い合わせ内容</h2>
                    <p><?php echo $how2; ?></p>
                </div>
            </div>
        <div class="button">
        <input type="button" value="内容を修正する" onclick="history.back(-1)">
        <button type="submit" formaction="endpage.php" name="submit">送信する</button>
        </div>
    </form>
</div>
</body>

</html>