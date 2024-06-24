<?php require "../modules/DBconnect.php"; ?>
<?php require "../modules/header.php"; ?>

<link rel="stylesheet" href="../css/G-2-2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script type="text/javascript" src="../javascript/jquery-3.7.0.min.js" ></script>


    <?php
    $message = "";
    $result = 0;

    if(empty($_POST['mail_address'])){

    ?>

    <h1 style="text-align:center;">テスト用　新規登録画面</h1>
    <form action="signin_temp.php" method="post">
    <div style="text-align:center;">
    メールアドレス<input name="mail_address" type="text"> <br>
    パスワード<input name="password" type="text"> <br>
    ユーザネーム<input name="user_name" type="text"> <br>
    電話番号<input name="user_tel" type="text"> <br>
    性別<input name="user_sex" type="number"> <br>
    <br>
    <button id="signin_button">サインイン</button>
    </div>
    </form>

    <?php
    }else{

        $mail_address = $_POST['mail_address'];
        $password = $_POST['password'];
        $user_name = $_POST['user_name'];
        $user_tel = $_POST['user_tel'];
        $user_sex = $_POST['user_sex'];
        $user_id = 0;

        $pdo = new PDO($connect,USER,PASS);
        $sql = $pdo->prepare("INSERT INTO user(user_password, user_name, user_tel, mail_address, user_sex) VALUES (?,?,?,?,?);");
        //同じユーザネームなど関係なしに登録してしまっている
        if($sql->execute([$password,$user_name,$user_tel,$mail_address,false])){
            $result = 0;
            $user_id = $pdo->lastInsertId();
            $image_num = 1+($user_id%5);
            $default_pfp = "default".$image_num.".png";
            $sql = $pdo->prepare("INSERT INTO profile(user_id,user_profile_image_path,user_description) values(?,?,'ユーザーは自己紹介文を書いていません')");
            if(!$sql->execute([$user_id,$default_pfp]))$result=-1;
        }else{
            $result = -1;
        }

    ?>


    <h1 style="text-align:center;"><?php echo ($result==0 ? "成功":"失敗"); ?></h1>

    <button onclick="location.href='G1-13login-input.php'">
            ログイン画面へ
    </button>

    <?php

    }
    ?>


    <!--<?php require "G0-0footer.php"; ?> -->

    </body>
</html>