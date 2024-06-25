<?php session_start(); ?>
<?php require "../modules/DBconnect.php"; ?>
<?php require "../modules/header.php"; ?>

    <link rel="stylesheet" href="../css/G-2destiny.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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
            margin: 0;
            width: 33%;
        }
        </style>
        <hr>

        <?php
    $pdo = new PDO($connect, USER, PASS);
    $user_logged_id = $_SESSION['user']['id'];
    $sql = $pdo->prepare("select * from user where user_id != ?");
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

<?php require "G0-0footer.php"; ?>

    </body>
</html>