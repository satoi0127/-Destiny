<?php require "DBconnect.php"; ?>
<?php require "showparty.php"; ?>
<?php
    $party_id = $_POST['party_id'];
    echo showparty($connect,$party_id);
?>