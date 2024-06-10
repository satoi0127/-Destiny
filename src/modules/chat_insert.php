<?php require "DBconnect.php"; ?>
<?php require "showchat.php"; ?>
<?php

$message = $_POST['message'];
$user_id = $_POST['user_id'];
$chatroom_id = $_POST['chatroom_id'];

$pdo = new PDO($connect,user,pass);
$sql = $pdo->prepare("insert into message(chatroom_id,user_id,message_data) VALUES(?,?,?)");
if($sql->execute([$chatroom_id,$user_id,$message])){
    echo showchat($connect,$chatroom_id);
}else{
    echo 'failed to send messages';
}

?>