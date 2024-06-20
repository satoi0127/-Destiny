<?php session_start(); ?>
<?php require "../modules/DBconnect.php"; ?>
<?php require "../modules/header.php"; ?>

    <link rel="stylesheet" href="../css/G-2-2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script type="text/javascript" src="../javascript/jquery-3.7.0.min.js" ></script>

    <a href="#" class="arrow_btn arrow_01"></a>

    <div style="width:100%; height:10px;
    background: linear-gradient(90deg, rgba(0,212,255,1) 0%, rgba(9,9,221,1) 35%, rgba(200,45,64,1) 100%); "></div>

        <div style="width: 100%; height: 54px; border: 1px solid black;">
            <a href="G-2-1destinyAll.php"><button class="topbutton" >全て</button></a>
            <a href="G-2-2destinyNearUser.php"><button class="topbutton" >近くのメンバー</button></a>
            <button class="topbutton" >趣味</button>
        </div>

    <style>
        hr{
            border: none;
            border-bottom: 2px solid #333;
            margin:0px;
            position:relative;
            left:128px;
            width: 33%;
        }
        </style>
        <hr>
        

    <div class="border">
        
        <input type="hidden" id="user_id" value=<?= $_SESSION['user']['id'] ?>>
        <?php
        $pdo = new PDO($connect,USER,PASS);
        $sql = $pdo->prepare("SELECT * FROM user WHERE user_id = 1");
        $sql->execute([]);
        $location = $sql->fetchAll()[0]["user_coordinate_latitude"];
        ?>

        <div id="user_location">
        <p class="aaa">現在地 <button id="updatelocation"><i class="fa fa-refresh" aria-hidden="true"></i></button> </p>

        <br>
        <p>緯度:<div id="latitude"></div></p>
        <p>経度:<div id="longitude"></div></p>
        <p>地名:<div id="place_name">Fukuoka, japan</div></p>
        </div>
        
    </div>

    <?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->query("select * from user");
    foreach ($sql as $user_data) {
        echo "<div class=\"user_list_individual\">";
        echo "<div class=\"image_and_name\">";
        $pfp_path = $pdo->prepare("SELECT user_profile_image_path FROM profile WHERE profile_id = ?");
        $pfp_path->execute([$user_data['user_id']]);
        $pfp_path = $pfp_path->fetchAll()[0]['user_profile_image_path'];
        echo '<img src="../image/',$pfp_path,'" class="user_list_individual_image" style="background-color: gainsboro; width: 64px; height: 64px; border-radius: 15%;">';
        echo '<p style="font-size: 18px;">', $user_data["user_name"], "</p>";
        echo "</div>";

        $user_description = $pdo->prepare("SELECT user_description FROM profile WHERE user_id = ?");
        $user_description->execute([$user_data['user_id']]);
        $description = $user_description->fetchAll()[0]["user_description"];

        echo '<p style="font-size: 12px;">',
            $description,
            "</p>";
        echo "</div>";
    }
    ?>

    <script type="text/javascript" src="../javascript/updatelocation.js"></script>

    <?php require "G0-0footer.php"; ?>

    </body>
</html>