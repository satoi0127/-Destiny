
<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- <meta charset="UTF-8"> -->
 <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
 <link rel="stylesheet" href="../css/G-6-1 search.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>kaihatu</title>
</head>
<body>
    <a href="#" class="arrow_btn arrow_01"></a>

    <div class="form">
        <form method="get" id="form2" action="自分のサイトURL">
            <input id="sbox3" name="s" type="text" placeholder="キーワードを入力">
            <button id="sbtn4" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            <!-- <link href="https://fonts.googleapis.com/earlyaccess/hannari.css" rel="stylesheet"> -->

        </form>
    </div>

    <?php
        $pdo=new PDO($connect,USER,PASS);
        if(isset($_POST['keyword'])){
        $sql=$pdo->prepare('select usr.usr_name AS user_name , interest.interest_name AS interest_name 
                            from userinterest
                            Join user On userinterest.user_id = user_id
                            Join interest On userinterest.interest_id = interest_id
                            where user_name like ? And interest_name like ?');
        $sql->execute(['%'.$_POST['keyword'].'%']);
        }else{
            echo "No results found.";
        }
    ?>
    

    <div class="rireki">
        <h4>検索履歴</h4>
        <p>スポーツ</p>
        <p>読書</p>
        <h4>おすすめ</h4>
    </div>

    <div class="box">
        <img src="../image/虎.jpg" alt="">
        <div class="text">
                 <h3>虎虎　虎虎あいNO</h3>
        <p>狩り</p>
        <p>大食い</p>
        </div>
        </div>

        <div class="box">
            <img src="../image/虎.jpg" alt="">
            <div class="text">
                     <h3>虎虎　虎虎あいNO</h3>
            <p>狩り</p>
            <p>大食い</p>
            </div>
            </div>

            <div class="box">
                <img src="../image/虎.jpg" alt="">
                <div class="text">
                         <h3>虎虎　虎虎あいNO</h3>
                <p>狩り</p>
                <p>大食い</p>
                </div>
                </div>
    
<?php require 'G0-0footer.php'; ?>

    </body>
    </html>