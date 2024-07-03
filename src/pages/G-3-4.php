<?php session_start(); ?>
<?php require '../modules/DBconnect.php'; ?>
<?php require "../modules/showchat.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/G-3-4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="../javascript/jquery-3.7.0.min.js" ></script>
    <script src="../javascript/updatechat.js"></script>
    <title>パーティーチャット画面</title>
</head>
<body>
<?php

$party_name = "";
$party_id = 0;
$chatmember_id = 0;

$member_count = 0;

$pdo = new PDO($connect,USER,PASS);


if(!isset($_POST['party_id'])){
    echo 'チャットルームIDが指定されていません。新しくパーティーチャットを作成します';

    $newchatmember_id = $pdo->query("SELECT MAX(party_id)+1 as newid FROM party_member;");
    $newchatmember_id = $newchatmember_id->fetchAll()[0]['newid'];
    $sql = $pdo->prepare("INSERT INTO party_member(party_member_id,party_id,user_id) VALUES(null,?,?)");
    $sql->execute([$newchatmember_id,$_POST['host_id']]);
    $chatmember_id = $newchatmember_id;

    $sql = $pdo->prepare("INSERT INTO party(party_name,party_description,party_member_id) VALUES (?,?,?)");
    
    if($sql->execute([$_POST['party_name'],$_POST['party_description'],$chatmember_id])){
      echo '成功';
    }else{
      echo '失敗';
    }
  
    $party_id = $pdo->lastInsertId();
    $party_name = $_POST['party_name'];
    
    foreach($_POST['interest'] as $val){
        $sql2 = $pdo->prepare("INSERT INTO partyInterest(paryInterest_id,party_id,interest_id) VALUES (null,?,?)");
        $sql2 -> execute([$party_id,$val]);
        }
    

}else{
    $party_id = $_POST['party_id'];
    $query = $pdo->prepare("SELECT chat_member_id FROM party WHERE party_id = ?");
    $query->execute([$party_id]);
    $chatmember_id = $query->fetchAll()[0]['chat_member_id'];

    $user_id = $_SESSION['user']['id'];
    
    //パーティーメンバーの数
    $party_member_num = $pdo->prepare("SELECT COUNT(*) as num FROM chatmember WHERE chatmember_id = ?");
    $party_member_num->execute([$party_id]);
    $member_count = $party_member_num->fetchAll()[0]['num'];

    $query = $pdo->prepare("SELECT COUNT(*) as matches FROM chatmember WHERE ? IN(SELECT user_id FROM chatmember WHERE chatmember_id = ?)");
    $query->execute([$user_id,$party_id]);
    $is_new_member = $query->fetchAll()[0]['matches'];

    if($is_new_member==0){
        $query = $pdo->prepare('INSERT INTO chatmember(chatmember_id,user_id) VALUES(?,?)');
        $query->execute([$party_id,$user_id]);
    }
}

?>

<div class="container">
    <a href="./G-3-1party.php" class="arrow_btn arrow_01"><span style="color:#ff0000;">退出</span></a>

<div class="bar"><a href="./G-3-5.php" class="bars"><img src="../image/bars.png" alt="" class="barsimg"></a></div>
    <h2 class="text1"><?= $party_name?></h2><br>

    <input type="hidden" id="chatmember_id" value=<?= $chatmember_id ?>>
    <input type="hidden" id="user_id" value=<?= $_SESSION['user']['id'] ?>>

    <div id="ajax">
    <?php showchat($connect,$chatmember_id); ?>
    </div>

    <footer>
        <div class="sendbox">
         <input id="message" type="textarea" value="" placeholder="Aa" name="sendtext" class="sendtext" style="width: 200px; height: 30px;">
         <button><img src="../image/send.png" alt="" class="sendimg" id="sendbutton"></button>
        </div>
    </footer>
</div>

<script src="../javascript/sendmessage.js"></script>
<div style="height:10vh;"></div> <!--フッターメニューにめり込まないように余白-->
</body>
</html>