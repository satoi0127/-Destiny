<?php session_start(); ?>
<?php require "../modules/DBconnect.php"; ?>
<?php $pdo = new PDO($connect,USER,PASS); ?>
<?php require "../modules/header.php"; ?>

<link rel="stylesheet" href="../css/G-4-1.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<body>
<!-- → -->
    <a href="javascript:history.back();" class="arrow_btn arrow_01" style="position: absolute;"></a>
    <!-- <div class="hen">
    <a href="http://localhost/src/pages/G-4-2.php">
    <img src="../image/pitu.png" alt=""></a>
    <a href="ruma_page.php"><img src="../image/ruma.png" alt=""></a>
    </div> -->

    <?php

$profileUserId = $_SESSION['user']['id'];

if (isset($_GET['user_id'])) {
    $profileUserId = $_GET['user_id'];
}

// プロフィール情報の取得
$sql = "SELECT DISTINCT user_profile_image_path, u.user_name, user_description, i.interest_name, u.user_id
FROM profile p
JOIN user u ON p.user_id = u.user_id
JOIN userInterest ui ON p.user_id = ui.user_id
JOIN interest i ON ui.interest_id = i.interest_id
WHERE u.user_id = ? AND i.interest_id = ui.interest_id" ; 
$stmt = $pdo->prepare($sql);
$stmt -> execute([$profileUserId]);
$userdata = $stmt->fetchAll()[0];
$profile_image_path = $userdata['user_profile_image_path'];

// $default_image_path = "../image/null.jpg"; 

// $profile_image_path = $profile_image_path ? "../image/" . $profile_image_path : $default_image_path;

$profile_image_path = "../image/". $profile_image_path;



$isCurrentUser = ($profileUserId === $_SESSION['user']['id']);

$sql2 = $pdo->prepare('select * from profile where user_id = ?');
$sql2->execute([$profileUserId]);
foreach($sql2 as $i){
    $star = $i['user_starsign'];
    $blood = $i['user_blood_type'];
    $purpose = $i['user_purpose'];
    $height = $i['user_height'];
}

$star_signs = array(0 =>'おひつじ座',1 =>'おうし座',2 =>'ふたご座',3 =>'かに座',4 =>'しし座',5 =>'おとめ座',6 =>'てんびん座',7 =>'さそり座', 8 =>'いて座', 9 =>'やぎ座', 10 =>'みずがめ座', 11 =>'うお座' , 255 => '未設定' );
$blood_types = array(0 => 'A型',1 =>'B型',2 =>'AB型',3 =>'O型', 255 => '未設定' );
$purposes = array(0 =>'暇つぶし',1 =>'恋人探し',2 =>'友達探し', 3 =>'まだ分からない', 255 => '未設定');

?>


<div class="huka">
    <h1>プロフィール</h1>
    
    <img  src="<?php echo $profile_image_path; ?>" alt="プロフィール画像">

   <h2> <?php echo $userdata['user_name']; ?> </h2>
   </div>
    <h2>自己紹介</h2>
    <div class=ai>
        <h4> <?php echo $userdata['user_description']; ?> </h4>
    </div>
    <h2>趣味</h2> 
    <div class=ai>
    <?php
        $intid = [];
        $userint = $pdo->prepare('select * from userInterest where user_id = ?');
        $userint -> execute([$profileUserId]);
        foreach($userint as $value){
            $intid[] =$value['interest_id']; 
        }
        foreach( $intid as $i ){ 
            $sql3 = $pdo->prepare('select * from interest where interest_id = ?');
            $sql3-> execute([$i]);
            foreach($sql3 as $userinterest){
                echo '<h4>'.$userinterest['interest_name'].'</h4>';
            }
        } 
        
    ?>
    </div>
    <h2>星座</h2> 
    <div class=ai>
        <h4> <?php echo $star_signs[$star]; ?></h4>
    </div>

    <h2>身長</h2> 
    <div class=ai>
        <h4> <?php echo $height; ?></h4>
    </div>

    <h2>血液型</h2> 
    <div class=ai>
        <h4> <?php echo $blood_types[$blood]; ?></h4>
    </div>

    <h2>目的</h2> 
    <div class=ai>
        <h4> <?php echo $purposes[$purpose]; ?></h4>
    </div>

<?php if ($isCurrentUser): ?>
    <div class="hen">
    <a href="G-4-2.php">
    <img src="../image/pitu.png" alt=""></a>
    </div>
    <a href="logout.php"  class="btn btn--orange btn--radius">ログアウト</a>
    <?php else: ?>
        <p class="chat"><a href="G-5-2.php?user_id=<?php echo $profileUserId; ?>"><img src="../image/image.png" alt=""> </a></p>
    <?php endif; ?>
    
    <?php require 'G0-0footer.php'; ?>
</body>
</html>
<!-- [$_GET['user_id']] -->
<!-- , p.starsign, p.height, p.blood_type, p.purpose -->