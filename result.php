<?php
session_start(); // セッション開始
include 'db_connect.php'; // データベース接続をインクルード

// セッションからデータを取得
$dog_name = isset($_SESSION['dog_name']) ? $_SESSION['dog_name'] : '不明';
$dog_age = isset($_SESSION['dog_age']) ? $_SESSION['dog_age'] : '不明';
$body_type = isset($_SESSION['body_type']) ? $_SESSION['body_type'] : '不明';
$exercise = isset($_SESSION['exercise']) ? $_SESSION['exercise'] : '不明';
$food_frequency = isset($_SESSION['food_frequency']) ? $_SESSION['food_frequency'] : '不明';
$water_intake = isset($_SESSION['water_intake']) ? $_SESSION['water_intake'] : '不明';
$personality = isset($_SESSION['personality']) ? $_SESSION['personality'] : '不明';
$favorite_play = isset($_SESSION['favorite_play']) ? $_SESSION['favorite_play'] : '不明';
$health_condition = isset($_SESSION['health_condition']) ? $_SESSION['health_condition'] : '不明';
$activity_level = isset($_SESSION['activity_level']) ? $_SESSION['activity_level'] : '不明';

// データベースへのデータ保存
$sql = "INSERT INTO dog_diagnosis (dog_name, body_type, exercise, food_frequency, water_intake, personality, favorite_play, health_condition, activity_level) 
        VALUES ('$dog_name', '$body_type', '$exercise', '$food_frequency', '$water_intake', '$personality', '$favorite_play', '$health_condition', '$activity_level')";

if ($conn->query($sql) === TRUE) {
    $save_message = "データが正常に登録されました。";
} else {
    $save_message = "データの登録に失敗しました: " . $conn->error;
}

$conn->close(); // 接続を閉じる

// ランダムアドバイスのリスト
$advices = [
    "健康維持のために、日々の食事バランスを見直しましょう。",
    "適度な運動と休息を心がけて、愛犬の健康をサポートしましょう。",
    "水分補給を忘れずに！水分は愛犬の健康に欠かせません。",
    "体型維持のために、おやつの量を調整してみましょう。",
    "散歩の時間を増やして、愛犬のストレス発散に繋げましょう。",
    "食事の頻度を見直して、愛犬の消化を助けるリズムを作りましょう。",
    "定期的な健康チェックで、愛犬の体調管理を怠らないようにしましょう。",
    "お腹の健康を守るため、消化に良いフードを選んであげましょう。",
    "運動後は十分な休息を取ることで、愛犬の疲労回復を助けます。",
    "遊びを取り入れて、愛犬の心と体を健やかに保ちましょう。"
];

// ランダムにアドバイスを選択
$random_advice = $advices[array_rand($advices)];

// ランダムに犬の画像を選択
$dog_images = [
    'dog1.jpg',   // 1枚目の画像
    'dog2.jpg',   // 2枚目の画像
    'dog3.jpg',   // 3枚目の画像
    'dog4.jpg',   // 4枚目の画像
    'dog5.jpg'    // 5枚目の画像
];

$random_image = $dog_images[array_rand($dog_images)]; // 画像をランダムに選択
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>診断結果</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #fce4ec;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .result-container {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 90%;
            text-align: center;
        }
        .title {
            font-size: 24px;
            color: #d81b60;
            margin-bottom: 20px;
        }
        .description {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }
        .advice {
            margin-bottom: 20px;
            font-size: 16px;
            color: #d81b60;
            font-weight: bold;
            background: #fce4ec;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #d81b60;
        }
        .dog-image {
            margin: 20px 0;
            width: 250px;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .result-item {
            margin-bottom: 10px;
            font-size: 18px;
            color: #333;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #d81b60;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #ad1457;
        }
    </style>
</head>
<body>

<div class="result-container">
    <h1 class="title">診断結果</h1>
    <p class="description">あなたの愛犬にぴったりのアドバイスをチェックしましょう！</p>
    
    <div class="advice">アドバイス: <?php echo htmlspecialchars($random_advice); ?></div>

    <img src="images/<?php echo $random_image; ?>" alt="犬の画像" class="dog-image">

    <div class="result-item">愛犬のお名前: <?php echo htmlspecialchars($dog_name); ?></div>
    <div class="result-item">年齢: <?php echo htmlspecialchars($dog_age); ?> 歳</div>
    <div class="result-item">体型: <?php echo htmlspecialchars($body_type); ?></div>
    <div class="result-item">運動量: <?php echo htmlspecialchars($exercise); ?></div>
    <div class="result-item">食事の頻度: <?php echo htmlspecialchars($food_frequency); ?></div>
    <div class="result-item">水の摂取量: <?php echo htmlspecialchars($water_intake); ?></div>
    <div class="result-item">性格: <?php echo htmlspecialchars($personality); ?></div>
    <div class="result-item">好きな遊び: <?php echo htmlspecialchars($favorite_play); ?></div>
    <div class="result-item">健康状態: <?php echo htmlspecialchars($health_condition); ?></div>
    <div class="result-item">活動レベル: <?php echo htmlspecialchars($activity_level); ?></div>
    <p><?php echo $save_message; ?></p>

    <button class="button" onclick="window.location.href='index.php';">再診断する</button>
</div>

</body>
</html>
