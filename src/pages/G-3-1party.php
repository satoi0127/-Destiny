<?php session_start(); ?>
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
        $pdo = new PDO($connect,USER,PASS);
        if(!empty($_POST)){
            $party_id = $_SESSION['party_name']['party_id'];
            $party_member_id = ['chatmember_id'];
        }else{

        }
    ?>
    <div class="container">
    <?php
        $sql = $pdo->prepare("select party_name,party_description from party where party_name = ?,party_description = ?");

        $sql ->execute([$_SESSION['party_name']['party_description']]);

        foreach($sql as $results){
            
            echo '<form action="G-3-4.php" method="post">';
            
        }

    ?>

    </div>
    <div onclick="location.href='./G-3-2party.php'" class="post-btn">
    <i class="fas fa-plus"></i>
    </div>
    <?php require 'G0-0footer.php'; ?>
    
</body>
</html>