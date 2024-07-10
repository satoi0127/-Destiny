<?php session_start(); ?>
<?php require "../modules/DBconnect.php"; ?>
<?php require "../modules/headerborder.php";?>
<?php require "../modules/header.php"; ?>

<style>
    .topbutton1{
        border-bottom:solid;
    }
</style>
    <link rel="stylesheet" href="../css/G-2destiny.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="#" class="arrow_btn arrow_01"></a>

        <?php
    $pdo = new PDO($connect, USER, PASS);
    $user_logged_id = $_SESSION['user']['id'];
    $sql = $pdo->prepare("select * from user where user_id != ? order by user_id desc");
    $sql->execute([$user_logged_id]);
    $individual_num = 0;
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
    <div style="height:10vh;"></div> <!--フッターメニューにめり込まないように余白-->
    <?php require "G0-0footer.php"; ?>

    </body>
</html>