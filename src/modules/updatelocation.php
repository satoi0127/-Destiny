<?php if(session_status() === PHP_SESSION_NONE)session_start(); ?>
<?php require "DBconnect.php"; ?>
<?php

$country = $_POST['country'];
$city = $_POST['city'];
$province = $_POST['province'];
$suburb = $_POST['suburb'];
$user_id = $_POST['user_id'];
$latitude = $_POST['lat'];
$longitude = $_POST['lon'];

$pdo = new PDO($connect,USER,PASS);
$query = $pdo->prepare("UPDATE user SET user_current_country = ?, user_current_city = ?, user_current_province = ?, user_current_suburb = ?, user_coordinate_latitude = ?, user_coordinate_longitude = ? WHERE user_id = ?");

if($query->execute([$country,$city,$province,$suburb,$latitude,$longitude,$user_id])){
    echo ":location update successful";
    $_SESSION['user']['coordinate_latitude'] = $latitude;
    $_SESSION['user']['coordinate_longitude'] = $longitude;
}else{
    echo ":location update failed!";
}

?>