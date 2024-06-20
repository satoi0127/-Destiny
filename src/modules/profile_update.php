<?php session_start(); ?>
<?php require "../modules/DBconnect.php"; ?>
<?php
    $pdo = new PDO($connect,USER,PASS);
    $userid = $_SESSION['user']['id'];
    $sql = $pdo->prepare('update profile set user_starsign = ?,user_height = ?,user_blood_type =?,user_purpose =?,user_description=? where user_id = ?');
    $sql->execute([$_POST['star']],[$_POST['height']],[$_POST['Blood']],[$_POST['purpose']],[$_POST['self']],[$userid]);
    $jiko = $_POST['self'];
    echo $jiko;
?>