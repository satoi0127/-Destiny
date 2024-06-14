<?php session_start();?>
<?php require '../modules/DBconnect.php'; ?>
<?php require "../modules/showchat.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/G-5-2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="../javascript/jquery-3.7.0.min.js" ></script>
   
   <script src="../javascript/updatechat.js"></script>
  
    <title>チャット詳細画面</title>
</head>
<body>

<?php
$pdo = new PDO($connect,USER,PASS);
  $chatroom_id=$_GET['chatid'];
  $user_id=$_SESSION['user']['id'];
  $sql = $pdo->prepare('select * from chatmember where user_id != ?');
  $sql->execute([$user_id]);
  foreach($sql as $row){
    $otherid=$row['user_id'];
  }
  $sql2 = $pdo->query('select * from user where user_id = ?');
  $sql2 ->execute([$otherid]);
  foreach($sql as $result){
    $other_name=$result['user_name'];
  }
  echo $chatroom_id;
?>
<div class="container" >
    <a href="G-5-1.php" class="arrow_btn arrow_01"></a>
    <h2 class="text1"><?= $other_name?></h2><br>
    <div id="ajax">
    <?php

  showchat($connect,$chatroom_id);

?>
</div>
    <!-- 左の吹き出し -->
    <!-- <div class="balloon-color left">
    <figure class="icon-color"><img src="../image/hukai.png" alt="代替えテキスト" >    
    </figure>
    <div class="chatting-color">
      <p class="text-color">よろしくお願いします！</p>
    </div>
    </div> -->
    <!-- 右の吹き出し -->
    <!-- <div class="balloon-color right">
    <div class="chatting-color">
      <p class="text-color">よろしく！</p>
      <p class="text-color">何歳ですか？</p>
    </div>
    </div> -->

    <!-- <div class="balloon-color left">
    <figure class="icon-color"><img src="../image/hukai.png" alt="代替えテキスト" >    
    </figure>
    <div class="chatting-color">
      <p class="text-color">白菜^^</p>
    </div>

    <div class="balloon-color left">
        <figure class="icon-color"><img src="../image/hukai.png" alt="代替えテキスト" >    
        </figure>
        <div class="chatting-color">
          <p class="text-color">まじまじマジンガー</p>
        </div>
    </div> -->
    
    <footer>
        <div class="sendbox">
        <input type="hidden" id="chatroom_id" value=<?= $chatroom_id?> >
    <input type="hidden" id="user_id" value=<?= $user_id ?> >
         <input type="textarea" id="message" placeholder="Aa" class="sendtext" style="width: 200px; height: 30px;">
         
         <button id="sendbutton"><img src="../image/send.png" alt="" class="sendimg" ></button>
        </div>
    </footer>
</div>
<script src="../javascript/sendmessage.js"></script>

</body>
</html>