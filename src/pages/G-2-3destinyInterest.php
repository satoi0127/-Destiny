<?php session_start(); ?>
<?php require "../modules/DBconnect.php"; ?>
<?php require "../modules/calc_dist.php"; ?>
<?php require "../modules/headerborder.php";?>
<?php require "../modules/header.php"; ?>

    <link rel="stylesheet" href="../css/G-2destiny.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script type="text/javascript" src="../javascript/jquery-3.7.0.min.js" ></script>

    <a href="#" class="arrow_btn arrow_01"></a>

    <div style="width:100%; height:10px;
    background: linear-gradient(90deg, rgba(0,212,255,1) 0%, rgba(9,9,221,1) 35%, rgba(200,45,64,1) 100%); "></div>

    

    <div class="border">

        <h1 style="text-align:center;">あなたと<br>同じ趣味のユーザー</h1>
        
        <input type="hidden" id="user_id" value=<?= $_SESSION['user']['id'] ?>>

        <?php

        $user_id = $_SESSION['user']['id'];
        $pdo = new PDO($connect,USER,PASS);
        $query = $pdo->prepare("SELECT interest_id FROM userInterest WHERE user_id = ?");
        $query->execute([$user_id]);

        $user_interests = $query->fetchAll();

        foreach($user_interests as $interests){
            echo $interests['interest_id'];
        }

        ?>

        
    </div>

    <div style="height:10vh;"></div> <!--フッターメニューにめり込まないように余白-->

    <script type="text/javascript" src="../javascript/updatelocation.js"></script>

    <?php require "G0-0footer.php"; ?>

    </body>
</html>