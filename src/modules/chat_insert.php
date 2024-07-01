<?php require "DBconnect.php"; ?>
<?php require "showchat.php"; ?>
<?php

$message = $_POST['message'];
$user_id = $_POST['user_id'];
$chatroom_id = $_POST['chatroom_id'];

$pdo = new PDO($connect,USER,PASS);
$sql = $pdo->prepare("insert into Message(message_text,user_id,chatroom_id) VALUES(?,?,?)");
if($sql->execute([$message,$user_id,$chatroom_id])){
    echo showchat($connect,$chatroom_id);
}else{
    echo 'failed to send messages';
}

?>
