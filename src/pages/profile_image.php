<?php session_start(); ?>
<?php require "../modules/DBconnect.php"; ?>
<?php
$user_id = $_SESSION['user']['id'];
$pdo = new PDO($connect,USER,PASS);

$sql = $pdo->prepare('select * from profile where user_id = ?');
$sql->execute([$user_id]);
foreach()
$profile_image_path = $userdata['user_profile_image_path'];
<img  class="profile" src="../image/<?php echo $profile_image_path; ?>"  alt="プロフィール画像">
