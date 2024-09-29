<?php
// データベース接続用の関数
function db_conn()
{
    try {
        // データベースの接続情報を設定します
        $db_name =  'masumi1214_gs_kadai08';            // データベース名
        $db_host =  'mysql80.masumi1214.sakura.ne.jp';  // DBホスト名
        $db_id =    ' ';                       // ユーザー名
        $db_pw =    ' ';                       // パスワード
        
        // DSN (Data Source Name) を作成してデータベースに接続
        $server_info = 'mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host;
        $pdo = new PDO($server_info, $db_id, $db_pw);
        // PDOのエラーモードを例外モードに設定
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $pdo; // 接続が成功した場合、PDOインスタンスを返す

    } catch (PDOException $e) {
        // 接続失敗時のエラーメッセージを表示
        exit('DB Connection Error: ' . $e->getMessage());
    }
}

// SQLエラー用の関数
function sql_error($stmt)
{
    // SQL実行時にエラーがある場合の処理
    $error = $stmt->errorInfo();
    // エラーメッセージを表示
    exit('SQL Error: ' . $error[2]);
}

// データ登録・更新後のリダイレクト処理
function redirect($file_name)
{
    // 指定されたページにリダイレクト
    header('Location: ' . $file_name);
    exit();
}
?>
