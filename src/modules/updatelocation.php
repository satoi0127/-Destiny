<?php require "DBconnect.php"; ?>
<?php

$country = $_POST['country'];
$city = $_POST['city'];
$province = $_POST['province'];
$suburb = $_POST['suburb'];
$user_id = $_POST['user_id'];

$pdo = new PDO($connect,USER,PASS);
$query = $pdo->prepare("UPDATE user SET user_current_country = ?, user_current_city = ?, user_current_province = ?, user_current_suburb = ? WHERE user_id = ?");

if($query->execute([$country,$city,$province,$suburb,$user_id])){
    echo ":location update successful";
}else{
    echo ":location update failed!";
}

?>