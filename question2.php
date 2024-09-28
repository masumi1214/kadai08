<?php
session_start(); // セッション開始

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['dog_age'] = $_POST['dog_age']; // セッションに保存
    header('Location: question3.php'); // 次の質問ページに移動
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>愛犬の年齢は？</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #ffe4e1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .question-container {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 90%;
            text-align: center;
            border: 2px solid #ff8a80;
        }
        .title {
            font-size: 24px;
            color: #ff6f61;
            margin-bottom: 20px;
        }
        .buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .button {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #ff6f61;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #ff3d00;
        }
    </style>
</head>
<body>

<div class="question-container">
    <h1 class="title">愛犬の年齢は？</h1>
    <form action="question2.php" method="post">
        <input type="number" name="dog_age" required placeholder="年齢を入力してください">
        <div class="buttons">
            <button type="submit" class="button button-next">次へ</button>
        </div>
    </form>
</div>

</body>
</html>
