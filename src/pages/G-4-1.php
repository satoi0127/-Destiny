<?php require '../modules/DBconnect.php'; 
try {
    // PDOによるデータベース接続
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // エラーモードを例外モードに設定
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // 文字コードをUTF-8に設定（必要に応じて変更してください）
    $pdo->exec("SET NAMES utf8");
} catch(PDOException $e) {
    // エラーが発生した場合はエラーメッセージを表示
    echo "データベースに接続できませんでした。エラー: " . $e->getMessage();
    exit(); // スクリプトの実行を終了
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/G-4-1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>kaihatu</title>
</head>
<body>
<!-- → -->
    <a href="#" class="arrow_btn arrow_01" style="position: absolute;"></a>
    <div class="hen">
    <a href="http://localhost/src/pages/G-4-2.php"><img src="../image/pitu.png" alt=""></a>
    <a href="ruma_page.php"><img src="../image/ruma.png" alt=""></a>
    </div>
    <?php
// データベース接続
require 'DBconnect.php';

// プロフィール情報の取得
$sql = "SELECT * FROM profiles WHERE user_id = :user_id"; // profilesはプロフィール情報が保存されているテーブル名、user_idはユーザーIDが保存されているカラム名
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT); // ユーザーIDを適切な値に置き換える
$stmt->execute();
$profile = $stmt->fetch(PDO::FETCH_ASSOC);

// プロフィール情報が取得できた場合は表示する
if ($profile) {
    $name = $profile['name'];
    $introduction = $profile['introduction'];
    $hobby = $profile['hobby'];
    $image_path = $profile['image_path']; // 画像のファイルパスが保存されているカラム名
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール</title>
</head>
<body>
    <h1>プロフィール</h1>
    <img src="<?php echo $image_path; ?>" alt="プロフィール画像">
    <p>名前: <?php echo $name; ?></p>
    <p>自己紹介: <?php echo $introduction; ?></p>
    <p>趣味: <?php echo $hobby; ?></p>
</body>
</html>

<?php
} else {
    // プロフィール情報が見つからない場合はエラーメッセージを表示
    echo "プロフィールが見つかりませんでした。";
}
?>
    <div class="huka">
        <img src="../image/hukai.png" alt="">
        <h2>深井君 〇〇歳 </h2>
    </div>  
    <h2>自己紹介</h2>
    <div class="ai"><h4>会いたいです</h4></div>
    <br>
    <h2>趣味</h2>
    <div class="ai"><h4>ゲーム テニス アウトドア</h4></div>
    <?php require 'G0-0footer.php'; ?>
</body>
</html>
