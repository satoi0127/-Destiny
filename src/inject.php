<?php require "DBconnect.php"; ?>
<?php
$pdo = new PDO($connect,USER,PASS);
$sql = $pdo->prepare("update profile SET user_profile_image_path = satoi.png WHERE user_id = ?");
$sql->execute([2]);
?>