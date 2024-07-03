<?php require "DBconnect.php"; ?>
<?php require "showparty.php"; ?>
<?php

$message = $_POST['message'];
$user_id = $_POST['user_id'];
$party_id = $_POST['party_id'];

$pdo = new PDO($connect,USER,PASS);
$sql = $pdo->prepare("insert into party_message(party_message,user_id,party_id) VALUES(?,?,?)");
if($sql->execute([$message,$user_id,$party_id])){
    echo showparty($connect,$party_id);
}else{
    echo 'failed to send messages';
}

?>
