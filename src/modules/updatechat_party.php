<?php require "DBconnect.php"; ?>
<?php require "showparty.php"; ?>
<?php
    $party_id = $_POST['chatmember_id'];
    echo showchat($connect,$party_id);
?>