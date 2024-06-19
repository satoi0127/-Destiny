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
$sql = "SELECT DISTINCT user_profile_image_path, u.user_name, user_description, i.interest_name, u.user_id, starsign, height, blood_type, purpose
FROM profile p
JOIN user u ON p.user_id = u.user_id
JOIN userInterest ui ON p.user_id = ui.user_id
JOIN interest i ON ui.interest_id = i.interest_id
WHERE u.user_id = ? AND i.interest_id = ui.interest_id" ; 
$stmt = $pdo->prepare($sql);
$stmt -> execute([$profileUserId]);
$userdata = $stmt->fetchAll()[0];
$profile_image_path = $userdata['user_profile_image_path'];



$profile_image_path = "../image/". $profile_image_path;

$isCurrentUser = ($profileUserId === $_SESSION['user']['id']);

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
        <h4> <?php echo $userdata['interest_name']; ?></h4>
    </div>

    <h2>星座</h2> 
    <div class=ai>
        <h4> <?php echo $userdata['starsign']; ?></h4>
    </div>

    <h2>身長</h2> 
    <div class=ai>
        <h4> <?php echo $userdata['height']; ?></h4>
    </div>

    <h2>血液型</h2> 
    <div class=ai>
        <h4> <?php echo $userdata['blood_type']; ?></h4>
    </div>

    <h2>目的</h2> 
    <div class=ai>
        <h4> <?php echo $userdata['purpose']; ?></h4>
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