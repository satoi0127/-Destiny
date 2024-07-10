<?php session_start(); ?>
<?php require "../modules/DBconnect.php"; ?>
<?php require "../modules/calc_dist.php"; ?>
<?php require "../modules/headerborder.php";?>
<?php require "../modules/header.php"; ?>

<style>
    .topbutton3{
        border-bottom:solid;
    }
</style>
    <link rel="stylesheet" href="../css/G-2destiny.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../javascript/jquery-3.7.0.min.js" ></script>

    <a href="#" class="arrow_btn arrow_01"></a>

    <div class="border">

        <h1 style="text-align:center;">あなたと<br>同じ趣味のユーザー</h1>
        
        <input type="hidden" id="user_id" value=<?= $_SESSION['user']['id'] ?>>

        <?php

        $user_id = $_SESSION['user']['id'];
        $user_logged_id = $user_id;
        $pdo = new PDO($connect,USER,PASS);
        $query = $pdo->prepare("SELECT interest_id FROM userInterest WHERE user_id = ?");
        $query->execute([$user_id]);
        $individual_num = 0;
        $user_interests = $query->fetchAll();

        foreach($user_interests as $interests){
            $query = $pdo->prepare("SELECT interest_name from interest where interest_id = ?");
            $query->execute([$interests['interest_id']]);
            $sql = $pdo->prepare("select * from user where user_id != ? and user_id IN(SELECT user_id FROM userInterest WHERE interest_id = ?) order by user_id desc");
            $sql->execute([$user_logged_id,$interests['interest_id']]);
            $sql = $sql->fetchAll();
            if(count($sql)!=0){
            echo "<h3>",$query->fetchAll()[0]['interest_name'],"</h3>";
            }
            //$matchuser = $pdo->prepare("SELECT  FROM userInterest WHERE interest_id = ?");
            //$matchuser->execute([$interests['interest_id']]);
            ?>

    <?php
    foreach ($sql as $user_data) {
        $individual_num++;
        $profile = $pdo->prepare("SELECT * FROM profile WHERE user_id = ?");
        $profile->execute([$user_data['user_id']]);
        $profile = $profile->fetchAll()[0];
    ?>

    <form name="individual_user<?=$individual_num?>" id="individual_user<?=$individual_num?>" action="G-4-1.php" method="GET">
        <input type="hidden" name="user_id" value="<?=$user_data['user_id']?>">
        <div class="user_list_individual" onClick="document.forms['individual_user<?=$individual_num?>'].submit();">
            <div class="image_and_name">
                <img src="../image/<?=$profile['user_profile_image_path']?>" alt="" class="user_list_individual_image" style="background-color: gainsboro; width: 64px; height: 64px; border-radius: 15%;">
                <p style="font-size: 18px;"><?=$user_data['user_name']?></p>
            </div>
            <p style="font-size: 12px;"><?=$profile['user_description']?></p>
        </div>
    </form>
    <?php
    }
    ?>

            <?php
        }

        ?>

        
    </div>

    <div style="height:10vh;"></div> <!--フッターメニューにめり込まないように余白-->

    <script type="text/javascript" src="../javascript/updatelocation.js"></script>

    <?php require "G0-0footer.php"; ?>

    </body>
</html>