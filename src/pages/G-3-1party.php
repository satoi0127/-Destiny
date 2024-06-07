<?php require '../modules/DBconnect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="../css/G-3-1.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>パーティー</title>
</head>
<body>
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
<?php
// パーティー情報の取得
    $party_name = $_POST['party_name'];
    $party_description = $_POST['party_description'];

    $sql = "INSERT INTO party(party_name,party_description) VALUES(:party_name,:party_description)";
    $stmt = $PDO->prepare($sql);
    $params = array(':party_name' => $party_name,':party_description' => $party_description);
    $stmt->execute($params);
?>

    <div class="container">
    <?php
        $pdo = new PDO($connect,USER,PASS);
        echo '<img src="<?php echo $profile_image_path; ?>" alt="写真" class="photo">';
        echo '<div class="text">';
        echo $party_name;
        echo '</div>';
        echo $party_description;
        echo '<input type="text" placeholder="メンバー" class="textboxb">';
    ?>
    </div>
    <div onclick="location.href='./G-3-2party.php'" class="post-btn">
    <i class="fas fa-plus"></i>
    </div>
    <?php require 'G0-0footer.php'; ?>
    
</body>
</html>