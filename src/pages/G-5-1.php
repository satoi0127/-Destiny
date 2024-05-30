<?php require '../modules/DBconnect.php'; ?>
<?php
$pdo = new PDO($connect,USER,PASS);
$sql = $pdo->query('select * from interest');
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/G-5-1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>チャット画面</title>
</head>
<body>
    <a href="#" class="arrow_btn arrow_01"></a>
<br><h3 class="text1">新しいマッチ</h3>
<img src="../image/gray.png" alt="">
<img src="../image/gray.png" alt="">
<img src="../image/gray.png" alt="">
<br><h3>メッセージ</h3>

<div>
<?php
$pdo = new PDO($connect,USER,PASS);
$kariid=3;
$sql = $pdo->query('select * from chatmember where user_id != 3');
foreach($sql as $row){
    $sendid=$row['user_id'];
}
echo $sendid;
    echo'<hr>';
    echo'<img src="../image/hukai.png" alt="" class="icon">';
    $sql = $pdo->query('select * from user where user_id = 6');
    foreach($sql as $row){
        echo'<h4 class="text2">',$row['user_name'],'</h4>';
    }
    $sql = $pdo->query('select * from Message where user_id = 6');
    foreach($sql as $row){
        echo'<p class="text3">',$row['message_text'],'</p>';
    }
   
    echo'<hr>';
?>
</div>



<div>
    <img src="../image/虎.jpg" alt="" class="icon">
    <h4 class="text2">とらのすけ</h4>
    <p class="text3">とらですよーーー</p>
    <hr>
</div>

<div>
    <img src="../image/hukai.png" alt="" class="icon">
    <h4 class="text2">名前</h4>
    <p class="text3">よろしく！</p>
    <hr>
</div>

<div>
    <img src="../image/hukai.png" alt="" class="icon">
    <h4 class="text2">名前</h4>
    <p class="text3">よろしく！</p>
    <hr>
</div>
<?php require 'G0-0footer.php'; ?>
</body>
</html>