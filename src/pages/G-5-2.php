<?php session_start();?>
<?php require '../modules/DBconnect.php'; ?>
<?php require "../modules/showchat.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="../css/G-5-2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="../javascript/jquery-3.7.0.min.js" ></script>
   
   <script src="../javascript/updatechat.js"></script>
  
    <title>チャット詳細画面</title>
</head>
<body>

  <div class="sita">
    <a href="#chat-bottom">
      <img src="../image/sita.png" alt="">
    </a>
  </div>

<?php
$pdo = new PDO($connect,USER,PASS);
if(!isset($_GET['chatid'])){
  $otherid = $_GET['user_id'];
  $user_id=$_SESSION['user']['id'];
  $kizonid = 0;
  $sql = $pdo->prepare("select * from chatmember where user_id=?");
  $sql->execute([$user_id]);
  foreach( $sql as $row){
    $sql2 = $pdo->prepare("select * from chatmember where chatmember_id=?");
    $sql2->execute([$row['chatmember_id']]);
    foreach( $sql2 as $row2){
      if($otherid == $row2['user_id']){
        $kizonid = 1;
        $chatmember_id = $row2['chatmember_id'];
      }
    }
  }
  if($kizonid == 0){
  $newchatmember_id = $pdo->query("SELECT MAX(chatmember_id)+1 as newid FROM chatmember;");
  $newchatmember_id = $newchatmember_id->fetchAll()[0]['newid'];
  $sql = $pdo->prepare("INSERT INTO chatmember(chatmember_id,user_id) VALUES(?,?),(?,?)");
  $sql->execute([$newchatmember_id,$user_id,$newchatmember_id,$otherid]);
  $chatmember_id = $newchatmember_id;
  }else{

    $user_id=$_SESSION['user']['id'];
    $sql = $pdo->prepare('select user_id from chatmember where chatmember_id = ?');
    $sql->execute([$chatmember_id]);
    foreach($sql as $row){
      if($row['user_id']!=$user_id){
      $otherid=$row['user_id'];
      }
  }
}
}else{
  $chatmember_id=$_GET['chatid'];
  $user_id=$_SESSION['user']['id'];
  $sql = $pdo->prepare('select user_id from chatmember where chatmember_id = ?');
  $sql->execute([$chatmember_id]);
    foreach($sql as $row){
      if($row['user_id']!=$user_id){
      $otherid=$row['user_id'];
      }
  }
  
}
$sql2 = $pdo->prepare('select * from user where user_id = ?');
  $sql2 ->execute([$otherid]);
  foreach($sql2 as $result){
    $other_name=$result['user_name'];
  }
  
  
?>
<div class="container" >
    <a href="G-5-1.php" class="arrow_btn arrow_01"></a>
    <h2 class="text1"><?php echo $other_name; ?></h2><br>
    <div id="ajax">
    <?php

  showchat($connect,$chatmember_id);

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
    
    <div id="chat-bottom"></div>

    <footer>
        <div class="sendbox">
        <input type="hidden" id="chatmember_id" value=<?= $chatmember_id?> >
    <input type="hidden" id="user_id" value=<?= $user_id ?> >
         <input  type="textarea" id="message" placeholder="Aa" class="sendtext" style="width: 200px; height: 30px;">
         
         <button id="sendbutton"><img src="../image/send.png" alt="" class="sendimg" ></button>
        </div>
    </footer>
</div>


<script>
  window.onload = function() {
    var chatBottom = document.getElementById('chat-bottom');
    chatBottom.scrollIntoView();
  };
</script>


<script src="../javascript/sendmessage.js"></script>

</body>
</html>