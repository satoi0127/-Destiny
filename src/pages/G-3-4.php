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
$chatroom_id = 0;

$pdo = new PDO($connect,USER,PASS);

if(!isset($_POST['party_id'])){
    echo 'チャットルームIDが指定されていません。新しくパーティーチャットを作成します';

    $newchatroom_id = $pdo->query("SELECT MAX(chatmember_id)+1 as newid FROM chatmember;");
    $newchatroom_id = $newchatroom_id->fetchAll()[0]['newid'];
    $sql = $pdo->prepare("INSERT INTO chatmember(chatmember_id,user_id) VALUES(?,?)");
    $sql->execute([$newchatroom_id,$_POST['host_id']]);
    $chatroom_id = $newchatroom_id;

    $sql = $pdo->prepare("INSERT INTO party(party_name,party_description,chat_member_id) VALUES (?,?,?)");
    if($sql->execute([$_POST['party_name'],$_POST['party_description'],$chatroom_id])){
      echo '成功';
    }else{
      echo '失敗';
    }
  
    $party_id = $pdo->lastInsertId();
    $party_name = $_POST['party_name'];


}else{
    $party_id = $_POST['party_id'];
    $query = $pdo->prepare("SELECT chat_member_id FROM party WHERE party_id = ?");
    $query->execute([$party_id]);
    $chatroom_id = $query->fetchAll()[0]['chat_member_id'];

}

?>

<div class="container">
    <a href="./G-3-1party.php" class="arrow_btn arrow_01"><span style="color:#ff0000;">退出</span></a>

<div class="bar"><a href="./G-3-5.php" class="bars"><img src="../image/bars.png" alt="" class="barsimg"></a></div>
    <h2 class="text1"><?= $party_name?></h2><br>

    <input type="hidden" id="chatroom_id" value=<?= $chatroom_id ?>>
    <input type="hidden" id="user_id" value=<?= $_SESSION['user']['id'] ?>>

    <div id="ajax">
    <?php showchat($connect,$chatroom_id); ?>
    </div>

    <footer>
        <div class="sendbox">
         <input id="message" type="textarea" value="" placeholder="Aa" name="sendtext" class="sendtext" style="width: 200px; height: 30px;">
         <button><img src="../image/send.png" alt="" class="sendimg" id="sendbutton"></button>
        </div>
    </footer>
</div>

<script src="../javascript/sendmessage.js"></script>

</body>
</html>