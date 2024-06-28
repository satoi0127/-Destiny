<?php session_start();?>
<?php require "../modules/DBconnect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/G-2destiny.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../leaflet/leaflet.css">
    <script type="text/javascript" src="../javascript/jquery-3.7.0.min.js" ></script>
    <script src="../leaflet/leaflet.js"></script>
    <title>マップ</title>
</head>
<body>
<div style="width:100%; height:10px;
    background: linear-gradient(90deg, rgba(0,212,255,1) 0%, rgba(9,9,221,1) 35%, rgba(200,45,64,1) 100%); "></div>
<?php require "destiny_tabmenu.php"; ?>
<style>
        hr{
            border: none;
            border-bottom: 2px solid #333;
            margin:0px;
            position:relative;
            left:calc(25%*3);
            width: 25%;
        }
        </style>
        <hr>

    <h1 style="text-align:center;">マップテスト</h1>

    <?php
    
    $latitude = $_SESSION['user']['coordinate_latitude'];
    $longitude = $_SESSION['user']['coordinate_longitude'];

    ?>

    <div style="height:320px;" id="map"></div>

    <script type="text/javascript">
        var map = L.map('map').setView([33.5901864, 130.3984387], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
    </script>
    


    <?php require "G0-0footer.php"; ?>

    </body>
</html>