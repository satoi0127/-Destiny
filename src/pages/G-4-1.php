<?php require '../modules/DBconnect.php'; 
$pdo = new PDO($connect,USER,PASS);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/G-4-1.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>kaihatu</title>
</head>
<body>
<!-- → -->
    <a href="javascript:history.back();" class="arrow_btn arrow_01" style="position: absolute;"></a>
    <div class="hen">
    <a href="http://localhost/src/pages/G-4-2.php">
    <img src="../image/pitu.png" alt=""></a>
    <a href="ruma_page.php"><img src="../image/ruma.png" alt=""></a>
    </div>

    <?php

// プロフィール情報の取得
$sql = "SELECT DISTINCT user_profile_image_path, u.user_name, user_description, i.interest_name
FROM profile p
JOIN user u ON p.user_id = u.user_id
JOIN userinterest ui ON p.user_id = ui.user_id
JOIN interest i ON ui.interest_id = i.interest_id
WHERE u.user_id = 2 AND i.interest_id = ui.interest_id" ; 
$stmt = $pdo->query($sql);

$userdata = $stmt->fetchAll()[0];
$profile_image_path = $userdata['user_profile_image_path'];



$profile_image_path = "../image/". $profile_image_path;

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


<?php

?>
    
    <?php require 'G0-0footer.php'; ?>
</body>
</html>
