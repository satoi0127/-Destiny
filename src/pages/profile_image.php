<?php session_start(); ?>
<?php require "../modules/DBconnect.php"; ?>
<?php
$user_id = $_SESSION['user']['id'];
$pdo = new PDO($connect,USER,PASS);

$sql = $pdo->prepare('select * from profile where user_id = ?');
$sql->execute([$user_id]);
foreach($sql as $userdata){
$profile_image_path = $userdata['user_profile_image_path'];
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile_image.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Document</title>
</head>
<body>

<div>
<a href="G-4-1.php" class="arrow_btn arrow_01" style="position: absolute;"></a>
    <h1>プロフィール画面編集</h1>
    <img  class="profile" src="../image/<?php echo $profile_image_path; ?>"  alt="プロフィール画像">
    <form action="../modules/imageupload.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="user_id" value=<?= $_SESSION['user']['id'] ?> >
    <input type="file" name="filetoupload" id="filetoupload">
    <input type="submit" name="submit" value="アップロード">
</form>
</div>
</body>
</html>