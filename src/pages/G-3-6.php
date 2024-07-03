<?php session_start(); ?>
<?php require '../modules/DBconnect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="../css/G-3-6.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>パーティー</title>
</head>
<body>
    <a href="./G-3-5.php" class="arrow_btn arrow_01"></a>
    <div class="follo"><p>フォロワー</p></div>
    <?php
        $pdo = new PDO($connect,USER,PASS);

        $sql = $pdo->prepare("select * from party");
    
        $sql ->execute([]);
        
        foreach($sql as $results){

            $sql2 = $pdo->prepare('select interest_id from partyInterest where party_id = ?');
            $sql2 -> execute([$results['party_id']]);
           
        $members = $pdo->prepare("SELECT user_id FROM chatmember WHERE chatmember_id = ?");
            $members->execute([$results['chat_member_id']]);

            foreach($members as $users){
                $query = $pdo->prepare("SELECT user_profile_image_path FROM profile WHERE user_id = ?");
                $query->execute([$users['user_id']]);
                $imagepath = $query->fetchAll()[0]['user_profile_image_path'];
                echo '<p><input type="checkbox"  class="checkbox-round" id="option1" name="options[]" value="option1">';
                echo '<img class="user_img" src="../image/',$imagepath,'" alt=""><label></label></p>';
            }
        }    
    ?>
    <!--
    <input type="checkbox"  class="checkbox-round" id="option1" name="options[]" value="option1">
    <label for="option1"><img src="../image/hukai.png" width="50px" height="50px">名前</label><br>
    

    <input type="checkbox"  class="checkbox-round" id="option2" name="options[]" value="option2">
    <label for="option2"><img src="../image/hukai.png" width="50px" height="50px">名前</label><br>
    

    <input type="checkbox"  class="checkbox-round" id="option3" name="options[]" value="option3">
    <label for="option3"><img src="../image/hukai.png" width="50px" height="50px">名前</label><br>
    -->
    <div class="center">
        <button onclick="location.href='./G-3-4.php'">招待</button>
    </div>
</body>
</html>