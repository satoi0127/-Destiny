<?php require '../modules/DBconnect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/G-4-2.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <a href="G-4-1.php" class="arrow_btn arrow_01" style="position: absolute;"></a>
    <a href="G-4-1.php" class="kann">完了</a>
    <br><h2 class="henn">編集</h2>
    <hr>
    <div class="conn">
   
    <img class="aa" src="../image/虎.jpg" alt="">
    <img class="aa" src="../image/gray.png" alt="">
    <img class="aa" src="../image/gray.png" alt="">
    </div>
    <div class="conn">
    <img class="aa" src="../image/gray.png" alt="">
    <img class="aa" src="../image/gray.png" alt="">
    <img class="aa" src="../image/gray.png" alt="">
    </div>
    <div class="conn">
    <img class="aa" src="../image/gray.png" alt="">
    <img class="aa" src="../image/gray.png" alt="">
    <img class="aa" src="../image/gray.png" alt="">
    <img class="mai" src="../image/mai.png" alt="">   
    <img class="pura1" src="../image/pura.png" alt="">   
    <img class="pura2" src="../image/pura.png" alt="">
    <img class="pura3" src="../image/pura.png" alt="">   
    <img class="pura4" src="../image/pura.png" alt="">
    <img class="pura5" src="../image/pura.png" alt="">   
    <img class="pura6" src="../image/pura.png" alt="">
    <img class="pura7" src="../image/pura.png" alt="">   
    <img class="pura8" src="../image/pura.png" alt=""> 
    <div>
        <h2>自己紹介</h2>
        <input id="ziko" name="a" type="text" placeholder="会いたいです">
        </div>
    
        <div>
        <h2>趣味</h2>
        <input id="syumi" name="b" type="text" placeholder="ゲーム テニス アウトドア">
        </div>
        <!-- //後でfor文 -->
        <!-- //セレクトボックス↓-->

        <div style="border: 1px solid black; display: flex;" class="tatikawa">
        <h2>身長</h2>
        <input style="border: 0px; margin: auto; height: 32px;" id="syumi" name="b" type="text" placeholder="172㎝">
        </div>
        
        <div style="border: 1px solid black; display: flex;" class="tatikawa">
            <h2>星座</h2>
            <input style="border: 0px; margin: auto; height: 32px;" id="syumi" name="b" type="text" placeholder="おひつじ座">
            </div>
    
        <div style="border: 1px solid black; display: flex;" class="tatikawa">
            <h2>血液型</h2>
            <div class="Bllod">
            <form action="index.php" method = "POST">
            <select name= "Blood">
            <option value = "A型">A型</option>
            <option value = "B型">B型</option>
            <option value = "AB型">AB型</option>
            <option value = "O型">O型</option>
        </div>
        </select>
            </div>
    
        <div style="border: 1px solid black; display: flex;" class="tatikawa">
            <h2>目的</h2>
            <input style="border: 0px; margin: auto; height: 32px;" id="syumi" name="b" type="text" placeholder="暇つぶし">
            </div>        
    </body>
    <?php require 'G0-0footer.php'; ?>
</body>
</html>