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
    <a href="./G-4-1.php" class="arrow_btn arrow_01"></a>
    <br><h2>パーティー</h2>
<hr>
    
    <?php
        $pdo = new PDO($connect,USER,PASS);
       
   
        
        $sql = $pdo->prepare("select * from party");
    
        $sql ->execute([]);

        foreach($sql as $results){

            echo'<div style="padding: bottom 32px; border-bottom: 1px solid black;">';
            echo'<form action="G-3-4.php" method="post">';
            echo'<input type="hidden" name="party_id" value="'.$results['party_id'].'">';
            echo'<h3>'.$results['party_name'].'</h3>';
            echo'<p>'.$results['party_description'].'</p>';
            echo'<div style="border: 1px solid black;">';
            $sql2 = $pdo->prepare('select interest_id from partyInterest where party_id = ?');
            $sql2 -> execute([$results['party_id']]);
            foreach($sql2 as $row){
                $sql3 = $pdo->prepare('select * from interest where interest_id = ?');
                $sql3 -> execute([$row['interest_id']]);
                foreach($sql3 as $row2){
                    echo '<label class="syumi">'.$row2['interest_name'].'</label>';
                }
            }
            echo'</div>';

            $members = $pdo->prepare("SELECT user_id FROM chatmember WHERE chatmember_id = ?");
            $members->execute([$results['chat_member_id']]);

            foreach($members as $users){
                $query = $pdo->prepare("SELECT user_profile_image_path FROM profile WHERE user_id = ?");
                $query->execute([$users['user_id']]);
                $imagepath = $query->fetchAll()[0]['user_profile_image_path'];
                echo '<img class="user_img" src="../image/',$imagepath,'" alt="">';
            }

            echo'<button type="submit" >チャット開始</button>';
            echo'</form>

            </div>';
        }
?>
            <!-- /*

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
                */
        $group_query = "SELECT * FROM user WHERE user_id IN (SELECT user_id FROM chatroom WHERE chatmember_id = 2);";

        ?> -->

    <div onclick="location.href='./G-3-2party.php'" class="post-btn">
    <i class="fas fa-plus"></i>
    </div>
    <div style="height:10vh;"></div> <!--フッターメニューにめり込まないように余白-->
    <?php require 'G0-0footer.php'; ?>
    
</body>
</html>