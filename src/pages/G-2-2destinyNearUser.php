<?php require "../modules/DBconnect.php"; ?>
<?php require "../modules/header.php"; ?>

    <link rel="stylesheet" href="../css/G-2-2.css">
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
            margin:0px;
            position:relative;
            left:128px;
            width: 33%;
        }
        </style>
        <hr>
        

    <div class="border">
        <p class="aaa">現在地 <i class="fa fa-refresh" aria-hidden="true"></i> </p>

        <?php
        $pdo = new PDO($connect,USER,PASS);
        $sql = $pdo->prepare("SELECT * FROM user WHERE user_id = 1");
        $sql->execute([]);
        $location = $sql->fetchAll()[0]["user_coordinate"];
        ?>

        <p class="bbb"><?= $location ?>Fukuoka, japan</p>
        
    </div>

    <div class="user_list_individual">
        <div class="user_list_individual_image" style="background-color: gainsboro; width: 64px; height: 64px; border-radius: 15%;"></div>
        <p style="font-size: 18px;">メンズコーチ　立川</p>
        <br>
        <p style="font-size: 12px; display: block;">テスト</p>
    </div>
    <div class="user_list_individual">
        <div class="user_list_individual_image" style="background-color: gainsboro; width: 64px; height: 64px; border-radius: 15%;"></div>
        <p style="font-size: 18px;">小関</p>
        <br>
        <p style="font-size: 12px; display: block;">テスト</p>
    </div>
    <div class="user_list_individual">
        <div class="user_list_individual_image" style="background-color: gainsboro; width: 64px; height: 64px; border-radius: 15%;"></div>
        <p style="font-size: 18px;">野崎</p>
        <br>
        <p style="font-size: 12px; display: block;">テスト</p>
    </div>
    <div class="user_list_individual">
        <div class="user_list_individual_image" style="background-color: gainsboro; width: 64px; height: 64px; border-radius: 15%;"></div>
        <p style="font-size: 18px;">吉本</p>
        <br>
        <p style="font-size: 12px; display: block;">テスト</p>
    </div>
    <div class="user_list_individual">
        <div class="user_list_individual_image" style="background-color: gainsboro; width: 64px; height: 64px; border-radius: 15%;"></div>
        <p style="font-size: 18px;">新原</p>
        <br>
        <p style="font-size: 12px; display: block;">テスト</p>
    </div>
    <div class="user_list_individual">
        <div class="user_list_individual_image" style="background-color: gainsboro; width: 64px; height: 64px; border-radius: 15%;"></div>
        <p style="font-size: 18px;">宇都</p>
        <br>
        <p style="font-size: 12px; display: block;">テスト</p>
    </div>

    <?php require "G0-0footer.php"; ?>

    </body>
</html>