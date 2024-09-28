<?php
// 背景画像やその他の設定を必要に応じて変更してください。
$imagePath = 'path_to_your_uploaded_image.jpg'; // アップロードした画像のパスを指定
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>診断スタート</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Arial', sans-serif;
            background-color: #f9f4ee; /* 背景色を画像に合わせて調整 */
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .illustration {
            background-image: url('<?php echo $imagePath; ?>');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            width: 100%;
            height: 70vh;
            max-width: 800px; /* イラストの最大幅を設定 */
        }

        .description {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }

        .start-button {
            display: inline-block;
            padding: 15px 30px;
            font-size: 18px;
            color: #fff;
            background-color: #ff6f61; /* ボタンの色 */
            border: none;
            border-radius: 30px;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .start-button:hover {
            background-color: #ff3f31; /* ホバー時の色 */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="illustration"></div>
        <p class="description">簡単な質問に答えると、あなたのペットの健康診断をします！</p>
        <a href="question1.php" class="start-button">健康診断スタート →</a>
    </div>
</body>
</html>
