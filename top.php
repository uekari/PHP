<!-- TOPページ(本ページ)：表示 -->

<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="top.css">
    <title>卒制に向けて</title>
    <!-- ライブラリ読み込み(menuを上部に設置) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- jsファイル読み込み -->
    <script src="top.js"></script>

</head>

<body>

    <div class="header">
        <div class="top">
        </div>
        <div class="title">
            <h1>タイトル</h1>
            <p>サブタイトル</p>
        </div>
        <header>
            <nav id="menu" class="menu">
                <a href="#about">○◯について</a>
                <a href="#course">ご利用の流れ</a>
                <a href="#question">よくある質問</a>
                <a href="#form">問い合わせ</a>
                <a href="#access">アクセス</a>
                <!-- <a href="login.php">ログイン</a> -->
                <a href="register.php">新規登録</a>
            </nav>
        </header>
    </div>

    <!-- ABOUT -->
    <a id="about"></a>
    <div>
        <div class="about">
            <h1>○◯について</h1>
            <p>ホームページについての色々を書く</p>
        </div>
    </div>


    <!-- ご利用の流れ-->
    <a id="course"></a>
    <div class="course">
        <h1>ご利用の流れ</h1>
        <p>ここに”ご利用の流れ”を書いていく</p>
    </div>


    <!-- よくある質問 -->
    <a id="question"></a>
    <div class="question">
        <div>
            <h1>よくある質問</h1>
            <p>ここに”よくある質問”を書いていく</p>
        </div>
    </div>


    <!-- フォーム -->
    <a id="form"></a>

    <div class="CONTACT_form">
        <form action="create.php" method="POST">
            <div class="form_top">
                <h1> お問い合わせフォーム </h1>
                <div class="img">
                    <img src="img/flower.jpg">
                </div>
                <h2>【メール対応時間】</h2>
                <p>９時００分〜１７時００分</p>
                <p>（土・日・祝日を除く）</p>
            </div>
            <div class="form_form">
                <div>
                    <p>お名前</p>
                    <input type="text" name="namae" required>
                </div>
                <div>
                    <p>メールアドレス</p>
                    <input type="email" name="email" required>
                </div>
                <div>
                    <p>お問い合わせ項目</p>
                    <select name="how1">
                        <option value="選択してください">- - - 選択して下さい - - -</option>
                        <option value="お手伝い">お手伝い</option>
                        <option value="お出かけ">お出かけ</option>
                        <option value="日帰り旅行">日帰り旅行</option>
                        <option value="宿泊旅行">宿泊旅行</option>
                        <option value="その他">その他</option>
                    </select>
                </div>
                <div>
                    <p>お問い合わせ内容<br></p>
                    <textarea placeholder="&#13;例) 車椅子の家族を連れて温泉旅行をしたい&#13;例) あのお店に行きたいが一人では外出できない" name="how2"
                        required></textarea>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="確認画面へ" class="btn" name="click">
            </div>
        </form>
    </div>

    <!-- ACCESS 
    <a id="access"></a>
    <div class="ACCESS">
        <div class="ACCESS_title">
            <h2>ACCESS</h2>
            <p>会社情報</p>
        </div>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.718064410104!2d130.3922803151523!3d33.58666874956824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354191aa0929fbdf%3A0xd5e535b27b5236c6!2z44K444O844K644Ki44Kr44OH44Of44O8!5e0!3m2!1sja!2sjp!4v1666591027196!5m2!1sja!2sjp"
                width="1300" height="731" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="ACCESS_end">
            <ul>会社名&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;チーズアカデミーFUKUOKA</ul>
            <ul>事務所所在地&emsp;&emsp;&emsp;〒810-0041 福岡市中央区大名1丁目3-41 プリオ大名ビル1F</ul>
            <ul>TEL&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; 000-000-0000</ul>
            <ul>FAX&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; 999-999-9999</ul>
            <ul>MAIL &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; dummy@cheeseacademy.tokyo</ul>
        </div>
    </div>
    -->

    <!-- footer -->
    <div class="last">
        <h1>footer</h12>
    </div>

</body>

</html>