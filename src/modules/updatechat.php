<?php require "DBconnect.php"; ?>
<?php require "showchat.php"; ?>
<?php
    $chatmember_id = $_POST['chatmember_id'];
    echo showchat($connect,$chatmember_id);
?>