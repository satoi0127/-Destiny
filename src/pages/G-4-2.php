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
<form action="../modules/profile_update.php" method = "POST" name="selfinfo">
    <a href="G-4-1.php" class="arrow_btn arrow_01" style="position: absolute;"></a>
    <a href=# class="kann" onclick="document.selfinfo.submit();">完了</a>
    <br><h2 class="henn">編集</h2>
    <hr>
    <?php

$profileUserId = $_SESSION['user']['id'];
$pdo = new PDO($connect,USER,PASS);
if (isset($_GET['user_id'])) {
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

$sql2 = $pdo->prepare('select * from profile where user_id = ?');
$sql2->execute([$profileUserId]);
foreach($sql2 as $i){
    $info = $i['user_description'];
    $star = $i['user_starsign'];
    $blood = $i['user_blood_type'];
    $purpose = $i['user_purpose'];
    $height = $i['user_height'];
}


$star_signs = array(0 =>'おひつじ座',1 =>'おうし座',2 =>'ふたご座',3 =>'かに座',4 =>'しし座',5 =>'おとめ座',6 =>'てんびん座',7 =>'さそり座', 8 =>'いて座', 9 =>'やぎ座', 10 =>'みずがめ座', 11 =>'うお座' );
$blood_types = array(0 => 'A型',1 =>'B型',2 =>'AB型',3 =>'O型' );
$purposes = array(0 =>'暇つぶし',1 =>'恋人探し',2 =>'友達探し', 3 =>'まだ分からない' );
?>

<img  src="../image/<?php echo $profile_image_path; ?>" alt="プロフィール画像">
        <h2>自己紹介</h2>
        <input name="self" type="text" <?php echo 'value="'.$info.'"'; ?>>
        </div>
        <div>
        <h2>趣味</h2>
        <?php
        $intid = [];
        $userint = $pdo->prepare('select * from userInterest where user_id = ?');
        $userint -> execute([$profileUserId]);
        foreach($userint as $value){
            $intid[] =$value['interest_id']; 
        }
        $sql = $pdo->query('select * from interest');
            foreach($sql as $row){
                if(in_array($row['interest_id'],$intid)){
                    echo '<input type="checkbox" name="interest[]" class="syumi2" id="la'.$row['interest_id'].'" value="'.$row['interest_id'].'" checked><label class="syumi3" for="la'.$row['interest_id'].'">'. $row['interest_name'].'</label>';
                }else{
                    echo '<input type="checkbox" name="interest[]" class="syumi2" id="la'.$row['interest_id'].'" value="'.$row['interest_id'].'"><label class="syumi3" for="la'.$row['interest_id'].'">'. $row['interest_name'].'</label>';
                }
                // echo '<button class="syumi" onclick="changeColor(this)">', $row['interest_name'], '</button>';
                
            }
        ?>
    
    <!-- <input type="text" id="clickedText" readonly>
    <script>
        function changeColor(button){
            button.classList.toggle('clicked');
            document.getElementById('clickedText').innerText = button.innerText;
            }
        </script> -->
        </div>
        
        <!-- //後でfor文 -->
        <!-- //セレクトボックス↓-->

        <div style="border: 1px solid black;" class="tatikawa">
        <h2>身長</h2>
        <input id="syumi" name="height" type="text" <?php echo 'value="'.$height.'"'; ?>>
        </div>
<?php        
        echo'<div style="border: 1px solid black;">';
            echo'<h2>星座</h2>';
            echo'<div class="star">';
            echo'<select name= "star">';
            for($i=0; $i<=11; $i++){
                if($star == $i){
                    echo'<option value = "'.$i.'" selected>'.$star_signs[$i].'</option>';   
                }else{
                    echo'<option value = "'.$i.'">'.$star_signs[$i].'</option>'; 
                }
            }
        echo'</select>';
            echo'</div>';
    
        echo'<div style="border: 1px solid black;">';
            echo'<h2>血液型</h2>';
            echo'<div class="Blood">';
            echo'<select name= "Blood">';
            for($i=0; $i<=3; $i++){
                if($blood == $i){
                    echo'<option value = "'.$i.'" selected>'.$blood_types[$i].'</option>';
                }else{
                    echo'<option value = "'.$i.'">'.$blood_types[$i].'</option>';
                }
                
            }
        echo'</select>';
            echo'</div>';
echo'</div>';
        echo'<div style="border: 1px solid black;">';
            echo'<h2>目的</h2>';
            echo'<div class="purpose">';
            echo'<select name= "purpose">';
            for($i=0; $i<=3; $i++){
                if($purpose == $i){
                    echo'<option value = "'.$i.'" selected>'.$purposes[$i].'</option>';
                }else{
                    echo'<option value = "'.$i.'">'.$purposes[$i].'</option>';
                }
                
            }
        echo'</select>';
echo'</div>';
?>
        </form>
    </body>
    <div style="height:10vh;"></div> <!--フッターメニューにめり込まないように余白-->
    <?php require 'G0-0footer.php'; ?>
</body>
</html>