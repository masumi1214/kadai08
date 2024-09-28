<?php
// 必要に応じて背景画像などの設定を行います。
$backgroundImage = 'path_to_your_background_image.jpg'; // 背景画像のパスを設定
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>無料診断スタート</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Arial', sans-serif;
        }

        .hero {
            background-image: url('<?php echo $backgroundImage; ?>');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .content {
            text-align: center;
            color: white;
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }

        .start-button {
            display: inline-block;
            padding: 15px 30px;
            font-size: 18px;
            color: #fff;
            background-color: #ff6f61;
            border: none;
            border-radius: 30px;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        .start-button:hover {
            background-color: #ff3f31;
        }
    </style>
</head>
<body>
    <div class="hero">
        <div class="content">
            <h1>肥満犬向けの健康管理サービス「ごちいぬ」</h1>
            <p>獣医師・ペット栄養管理士監修</p>
            <a href="next_screen.php" class="start-button">無料診断を始める</a> <!-- リンク先が next_screen.php に設定されています -->
        </div>
    </div>
</body>
</html>

<?php
// 関数用のファイルを使用できるように呼び出す
require_once('db_connect.php');

// 上記のfuncs.phpに書いている関数(db_conn)を呼び出して
// データベースに接続し、データ取得できるようにします。
// なるべく呼び出し先の関数と同じ変数名($pdoのことです)にしておくのが混乱を防ぐのにおすすめです
$pdo = db_conn();

// 下記でSQL文を実行します
// 下記ではgs_test_tableテーブルのデータを全権取得する書き方になっています
$stmt = $pdo->prepare('SELECT * FROM masumi1214_gs_kadai08');
// 実行結果をboolean(true or false)で取得します
$status = $stmt->execute();
