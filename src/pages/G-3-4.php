<?php session_start(); ?>
<?php require '../modules/DBconnect.php'; ?>
<?php require "../modules/showparty.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/G-3-4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="../javascript/jquery-3.7.0.min.js" ></script>
    <script src="../javascript/updatechat_party.js"></script>
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

    $sql = $pdo->prepare("INSERT INTO party(party_name,party_description,party_host_id) VALUES (?,?,?)");
    
    if($sql->execute([$_POST['party_name'],$_POST['party_description'],$_POST['host_id']])){
      echo '成功';
      $party_id = $pdo->lastInsertId();
      $sql3 = $pdo->prepare("INSERT INTO party_member(party_id,user_id) VALUES(?,?)");
      $sql3->execute([$party_id,$_POST['host_id']]);
      
    }else{
      echo '失敗';
    }
  
    $party_name = $_POST['party_name'];
    
    foreach($_POST['interest'] as $val){
        $sql2 = $pdo->prepare("INSERT INTO partyInterest(paryInterest_id,party_id,interest_id) VALUES (null,?,?)");
        $sql2 -> execute([$party_id,$val]);
        }
    

}else{
    $party_id = $_POST['party_id'];
    // $query = $pdo->prepare("SELECT chat_member_id FROM party WHERE party_id = ?");
    // $query->execute([$party_id]);
    // $chatmember_id = $query->fetchAll()[0]['chat_member_id'];

    $user_id = $_SESSION['user']['id'];
    
    //パーティーメンバーの数
    // $party_member_num = $pdo->prepare("SELECT COUNT(*) as num FROM party_member WHERE party_id = ?");
    // $party_member_num->execute([$party_id]);
    // $member_count = $party_member_num->fetchAll()[0]['num'];

    // $query = $pdo->prepare("SELECT COUNT(*) as matches FROM party_member WHERE party_id=? ");
    // $query->execute([$party_id]);
    // $is_new_member = $query->fetchAll()[0]['matches'];

    // if($is_new_member==0){
    //     $query = $pdo->prepare('INSERT INTO party_member(party_id,user_id) VALUES(?,?)');
    //     $query->execute([$party_id,$user_id]);
    // }
    // $kakunin = 0;
    // $sql4 = $pdo->prepare("select * from party_member where party_id = ?");
    // $sql4->execute([$party_id]);
    // foreach($sql4 as $row){
    //     if($row['user_id']!=$user_id){
    //        $kakunin = 1;
    //     }
    // }
    // if($kakunin == 1){
    // $query = $pdo->prepare('INSERT INTO party_member(party_id,user_id) VALUES(?,?)');
    // $query->execute([$party_id,$user_id]);
    // }
}

?>

<div class="container">
    <a href="./G-3-1party.php" class="arrow_btn arrow_01"><span style="color:#ff0000;">退出</span></a>


    <h2 class="text1"><?= $party_name?></h2><br>

    <input type="hidden" id="party_id" value=<?= $party_id ?>>
    <input type="hidden" id="user_id" value=<?= $_SESSION['user']['id'] ?>>

    <div id="ajax">
    <?php showparty($connect,$party_id); ?>
    </div>

    <footer>
        <div class="sendbox">
         <input id="message" type="textarea" value="" placeholder="Aa" name="sendtext" class="sendtext" style="width: 200px; height: 30px;">
         <button><img src="../image/send.png" alt="" class="sendimg" id="sendbutton"></button>
        </div>
    </footer>
</div>

<script src="../javascript/sendmessage_party.js"></script>
<div style="height:10vh;"></div> <!--フッターメニューにめり込まないように余白-->
</body>
</html>