<?php
// データベース接続情報
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dog_health_db";

// データベース接続の確立
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続確認
if ($conn->connect_error) {
    die("データベースへの接続に失敗しました: " . $conn->connect_error);
}

// フォームからのデータ受け取り
$dog_name = $_POST['dog_name'];
$body_type = $_POST['body_type'];
// 必要に応じて他のデータも受け取る

// データの保存クエリ
$sql = "INSERT INTO dog_diagnosis (dog_name, body_type) VALUES ('$dog_name', '$body_type')";

// クエリの実行とエラーチェック
if ($conn->query($sql) === TRUE) {
    echo "データが正常に登録されました。";
} else {
    echo "データの登録に失敗しました: " . $conn->error;
}

// 接続を閉じる
$conn->close();
?>
