<?php session_start(); ?>
<?php require '../modules/DBconnect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="../css/G-3-2.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>パーティー</title>
</head>
<body>
    <a href="./G-3-1.php" class="arrow_btn arrow_01"></a>
    <form method="POST" action="G-3-4.php">
    <input type="hidden" name="host_id" value=<?=$_SESSION['user']['id']?>> 
    <div class="container">
        <h3>パーティー名</h3>
        <input type="text" name="party_name"> 
        <h3>詳細（任意）</h3>
        <p><input type="text" class="large-input" name="party_description"></p>
    <div id="buttonContainer">
        <h2>趣味一覧</h2>
        <div class="checkbox-container">
        <?php
            $pdo = new PDO($connect,USER,PASS);
            $sql = $pdo->query('select * from interest');
            foreach($sql as $row){
            echo '<input type="checkbox" id="', $row['interest_id'],'">';
            echo '<label for="',$row['interest_id'],'">',$row['interest_name'],'</label>';
            }
            
        ?>
        </div>
    </div>
        <input type="submit" value="作成" />
    </div>
    <form>
    
</body>
</html>