<?php session_start(); ?>
<?php require "../modules/DBconnect.php"; ?>
<?php
    $pdo = new PDO($connect,USER,PASS);
    $sql = $pdo->prepare('update profile set user_starsign = ?,user_height = ?,user_blood_type =?,user_purpose =?,user_description=? where user_id = ?');
    $sql->execute([$_POST['star']],[$_POST['height']],[$_POST['']],[$_POST['']],[$_POST['']],[$userid]);
    $userid = $_SESSION['user']['id'];
    $jiko = $_POST['self'];
    echo $jiko;
?>