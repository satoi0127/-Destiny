<?php require "DBconnect.php"; ?>
<?php require "showchat.php"; ?>
<?php

$message = $_POST['message'];
$user_id = $_POST['user_id'];
$chatmember_id = $_POST['chatmember_id'];

$pdo = new PDO($connect,USER,PASS);
$sql = $pdo->prepare("insert into Message(message_text,user_id,chatmember_id) VALUES(?,?,?)");
if($sql->execute([$message,$user_id,$chatmember_id])){
    echo showchat($connect,$chatmember_id);
}else{
    echo 'failed to send messages';
}

?>
