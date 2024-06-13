<?php require "DBconnect.php"; ?>
<?php require "showchat.php"; ?>
<?php
    $chatroom_id = $_POST['chatroom_id'];
    echo showchat($connect,$chatroom_id);
?>