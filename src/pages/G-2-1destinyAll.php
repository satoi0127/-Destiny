<?php require "../modules/DBconnect.php"; ?>
<?php require "../modules/header.php"; ?>

    <link rel="stylesheet" href="../css/G-2destiny.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



    <a href="#" class="arrow_btn arrow_01"></a>

    <div style="width:100%; height:10px;
    background: linear-gradient(90deg, rgba(0,212,255,1) 0%, rgba(9,9,221,1) 35%, rgba(200,45,64,1) 100%); "></div>

    <div style="width: 100%; height: 54px; border: 1px solid black;">
            <button class="topbutton" >全て</button>
            <button class="topbutton" >近くのメンバー</button>
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
    $sql = $pdo->query("select * from user");
    foreach ($sql as $user_data) {
        echo "<div class=\"user_list_individual\">";
        echo '<div class="user_list_individual_image" style="background-color: gainsboro; width: 64px; height: 64px; border-radius: 15%;"></div>';
        echo '<p style="font-size: 18px;">', $user_data["user_name"], "</p>";
        echo "<br>";
        echo "<br>";
        echo '<p style="font-size: 12px; display: block;">',
            "家に泊まらせてください",
            "</p>";
        echo "</div>";
    }

/*

    <div class="user_list_individual">
        <div class="user_list_individual_image" style="background-color: gainsboro; width: 64px; height: 64px; border-radius: 15%;"></div>
        <p style="font-size: 18px;">メンズコーチ　立川</p>
        <br>
        <p style="font-size: 12px; display: block;">テスト</p>
    </div>

    */
?>

<?php require "G0-0footer.php"; ?>
<?php require "../modules/footer.php"; ?>
