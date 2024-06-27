<?php session_start(); ?>
<?php require "../modules/DBconnect.php"; ?>
<?php require "../modules/calc_dist.php"; ?>
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
        $sql = $pdo->prepare("SELECT * FROM user WHERE user_id = ?");
        $sql->execute([$_SESSION['user']['id']]);
        $location = $sql->fetchAll()[0];

        $country = $location['user_current_country'];
        $city = $location['user_current_city'];
        $province = $location['user_current_province'];
        $suburb = $location['user_current_suburb'];
        ?>

        <div id="user_location">
        <p class="aaa">現在地 <button id="updatelocation"><i class="fa fa-refresh" aria-hidden="true"></i></button> </p>
        <p class="aaa">地名:<div class="aaa" id="place_name"><?= $country ?> <?= $city ?> <?= $province ?> <?= $suburb ?></div></p>
        </div>
        
    </div>

    <?php

    $user_logged_id = $_SESSION['user']['id'];
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare("SELECT * from user WHERE user_id != ?");
    $sql->execute([$user_logged_id]);
    $individual_num = 0;
    foreach ($sql as $user_data) {
        $individual_num++;

        $profile = $pdo->prepare("SELECT * FROM profile where user_id = ?");
        $profile->execute([$user_data['user_id']]);
        $profile = $profile->fetchAll()[0];

        $user_lat = $location['user_coordinate_latitude'];
        $user_lon = $location['user_coordinate_longitude'];
        $other_user_lat = $user_data['user_coordinate_latitude'];
        $other_user_lon = $user_data['user_coordinate_longitude'];

        $dist = getdist($user_lat,$user_lon,$other_user_lat,$other_user_lon);
        ?>

        <form name="individual_user<?=$individual_num?>" id="individual_user<?=$individual_num?>" action="G-4-1.php" method="GET">
            <input type="hidden" name="user_id" value="<?=$user_data['user_id']?>">
                <div class="user_list_individual" onClick="document.forms['individual_user<?=$individual_num?>'].submit();">
                    <div class="image_and_name">
                        <img src="../image/<?=$profile['user_profile_image_path']?>" alt="" class="user_list_individual_image" style="background-color: gainsboro; width: 64px; height: 64px; border-radius: 15%;">
                        <p style="font-size: 18px;"><?=$user_data['user_name']?></p>
                    </div>
                    <p style="font-size: 12px;">
                        <?=$profile['user_description']?>
                        <br>
                        <?php echo '',$user_data['user_current_country'],' ',$user_data['user_current_city'],''?>
                    </p>
                </div>
        </form>

        <?php
    }
    ?>

    <div style="height:10vh;"></div> <!--フッターメニューにめり込まないように余白-->

    <script type="text/javascript" src="../javascript/updatelocation.js"></script>

    <?php require "G0-0footer.php"; ?>

    </body>
</html>