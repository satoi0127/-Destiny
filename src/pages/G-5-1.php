<?php session_start();?>
<?php require '../modules/DBconnect.php'; ?>

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
<!-- <br><h3 class="text1">新しいマッチ</h3>
<img src="../image/gray.png" alt="">
<img src="../image/gray.png" alt="">
<img src="../image/gray.png" alt=""> -->
<br><h3>メッセージ</h3>
<hr>

<?php
$pdo = new PDO($connect,USER,PASS);
$userid=$_SESSION['user']['id'];
$sql = $pdo->prepare('select chatmember_id from chatmember where user_id = ?');
$sql -> execute([$userid]);
foreach($sql as $row){
    $chatid=$row['chatmember_id'];
    $sql2 = $pdo->prepare('select user_id from chatmember where chatmember_id = ?');
    $sql2->execute([$row['chatmember_id']]);
    foreach($sql2 as $users){  
        if($users['user_id']!=$userid){
            echo'<div><a href="G-5-2.php?chatid=',$chatid,'">';
         
            $img = $pdo->prepare('select * from profile where user_id=?');
            $img -> execute([$users['user_id']]);
            foreach($img as $img2){
                echo'<img src="../image/',$img2['user_profile_image_path'],'" alt="" class="icon">';
            }
            $sql3 = $pdo->prepare('select * from user where user_id=?');
            $sql3 -> execute([$users['user_id']]);
            foreach($sql3 as $name){
                echo'<h4 class="text2">',$name['user_name'],'</h4>';
            }
            $sql4 = $pdo->prepare('select * from Message
            where chatmember_id = ? order by message_id desc limit 1');
            $sql4 -> execute([$row['chatmember_id']]);
            foreach($sql4 as $message){
            if(!isset($message['message_text'])){
                echo'<p class="text3">チャットしてみよう！</p>';
            }else{
                echo'<p class="text3">',$message['message_text'],'</p>';
            }
        }
    
    
    echo'<hr>';
    echo'</a></div>';
}
}}

?>
<?php require 'G0-0footer.php'; ?>
</body>
</html>