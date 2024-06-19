<?php session_start(); ?>
<?php require "../modules/DBconnect.php"; ?>

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
    <?php

$profileUserId = $_SESSION['user']['id'];
$pdo = new PDO($connect,USER,PASS);
if (isset($_GET['user_id'])) {
    $profileUserId = $_GET['user_id'];
}

// プロフィール情報の取得
$sql = "SELECT DISTINCT user_profile_image_path, u.user_name, user_description, i.interest_name,u.user_id
FROM profile p
JOIN user u ON p.user_id = u.user_id
JOIN userInterest ui ON p.user_id = ui.user_id
JOIN interest i ON ui.interest_id = i.interest_id
WHERE u.user_id = ? AND i.interest_id = ui.interest_id" ; 
$stmt = $pdo->prepare($sql);
$stmt -> execute([$profileUserId]);
$userdata = $stmt->fetchAll()[0];
$profile_image_path = $userdata['user_profile_image_path'];
?>
<img  src="../image/<?php echo $profile_image_path; ?>" alt="プロフィール画像">
        <h2>自己紹介</h2>
        <input id="ziko" name="a" type="text" placeholder="会いたいです">
        </div>
    
        <div>
        <h2>趣味</h2>
        <?php
        
    $sql = $pdo->query('select * from interest');
    foreach($sql as $row){
        echo '<button class="syumi" onclick="changeColor(this)">', $row['interest_name'], '</button>';
    }
    echo 'test'; 
    ?>
    <input type="text" id="clickedText" readonly>
    <script>
        function changeColor(button){
            button.classList.toggle('clicked');
            document.getElementById('clickedText').innerText = button.innerText;
            }
        </script>
        </div>
        
        <!-- //後でfor文 -->
        <!-- //セレクトボックス↓-->

        <div style="border: 1px solid black; display: flex;" class="tatikawa">
        <h2>身長</h2>
        <input style="border: 0px; margin: auto; height: 32px;" id="syumi" name="b" type="text" placeholder="172㎝">
        </div>
        
        <div style="border: 1px solid black;" class="tatikawa">
            <h2>星座</h2>
            <div class="star">
            <form action="index.php" method = "POST">
            <select name= "star">
            <option value = "おひつじ座">おひつじ座</option>
            <option value = "おうし座">おうし座</option>
            <option value = "ふたご座">ふたご座</option>
            <option value = "かに座">かに座</option>
            <option value = "しし座">しし座</option>
            <option value = "おとめ座">おとめ座</option>
            <option value = "てんびん座">てんびん座</option>
            <option value = "さそり座">さそり座</option>
            <option value = "いて座">いて座</option>
            <option value = "やぎ座">やぎ座</option>
            <option value = "みずがめ座">みずがめ座</option>
            <option value = "うお座">うお座</option>
        </select>
            </div>
    
        <div style="border: 1px solid black; display: flex;" class="tatikawa">
            <h2>血液型</h2>
            <div class="Bllod">
            <form action="index.php" method = "POST">
            <select name= "Bllod">
            <option value = "A型">A型</option>
            <option value = "B型">B型</option>
            <option value = "AB型">AB型</option>
            <option value = "O型">O型</option>
        </select>
            </div>
</div>
        <div style="border: 1px solid black; display: flex;" class="tatikawa">
            <h2>目的</h2>
            <div class="purpose">
            <form action="index.php" method = "POST">
            <select name= "purpose">
            <option value = "暇つぶし">暇つぶし</option>
            <option value = "恋人探し">恋人探し</option>
            <option value = "友達探し">友達探し</option>
            <option value = "わからない">分からない</option>
        </select>
</div>
                 
    </body>
    <?php require 'G0-0footer.php'; ?>
</body>
</html>