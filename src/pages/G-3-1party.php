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
        /*
        if(!empty($_POST)){
            $party_id = $_SESSION['party_name']['party_id'];
            $party_member_id = ['chatmember_id'];
        }else{

        }*/
    ?>
    <div class="container">
    <?php
        $sql = $pdo->prepare("select * from party");

        $sql ->execute([]);

        foreach($sql as $results){
            
            echo '<form action="G-3-4.php" method="post">';
            echo '<input type="hidden" name="party_id" value="',$results['party_id'],'">';

            echo $results['party_name'];
            echo $results['party_description'];
            //echo $results['interest_id'];
            echo '<button type="submit" >チャット開始</button>';

            $query = $pdo->prepare("select party_name,party_description from party where party_name = ?,party_description = ?");
            $query->execute([$results['party_id']]);

            echo '<br>';

            foreach($query as $users){
                echo '<div style="display:flex; float:left;">';
                $img_path_query = $pdo->prepare("SELECT user_image_path FROM user WHERE user_id = ?");
                $img_path_query->execute([$users['user_id']]);
                $img_path = $img_path_query->fetchAll()[0]['user_image_path'];
                echo '<img class="icon_small" src="uploads/',$img_path,'" alt="">';
                echo '</div>';
            }
           
            echo '</form>';

        }

        $group_query = "SELECT * FROM user WHERE user_id IN (SELECT user_id FROM chatroom WHERE chatroom_id = 2);";

    ?>

    </div>
    <div onclick="location.href='./G-3-2party.php'" class="post-btn">
    <i class="fas fa-plus"></i>
    </div>
    <?php require 'G0-0footer.php'; ?>
    
</body>
</html>