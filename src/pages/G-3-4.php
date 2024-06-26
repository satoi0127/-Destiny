<?php session_start(); ?>
<?php require '../modules/DBconnect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/G-3-4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>パーティーチャット画面</title>
</head>
<body>
<?php

if(!isset($_POST['party_id'])){
    echo 'チャットルームIDが指定されていません。新しくパーティーチャットを作成します';
    $pdo = new PDO($connect,USER,PASS);

    $sql = $pdo->prepare("INSERT INTO party(party_name,party_description) VALUES (?,?)");
    if($sql->execute([$_POST['party_name'],$_POST['party_description']])){
      echo '成功';
    }else{
      echo '失敗';
    }
  
    $party_id = $newchatroom_id;

}else{
    $chatroom_id = $_POST['party_id'];
}

?>

<div class="container">
    <a href="./G-3-1party.php" class="arrow_btn arrow_01"><span style="color:#ff0000;">退出</span></a>

<div class="bar"><a href="./G-3-5.php" class="bars"><img src="../image/bars.png" alt="" class="barsimg"></a></div>
    <h2 class="text1"><?= $party_name?>/h2><br>
    <!-- 左の吹き出し -->
    <div class="balloon-color left">
    <figure class="icon-color"><img src="../image/hukai.png" alt="代替えテキスト" >    
    </figure>
    <div class="chatting-color">
      <p class="text-color">よろしくお願いします！</p>
    </div>
    </div>
    <!-- 右の吹き出し -->
    <div class="balloon-color right">
    <div class="chatting-color">
      <p class="text-color">よろしく！</p>
    </div>
    </div>

    <div class="balloon-color left">
    <figure class="icon-color"><img src="../image/虎.jpg" alt="代替えテキスト" >    
    </figure>
    <div class="chatting-color">
      <p class="text-color">よろしくー</p>
    </div>

    <div class="balloon-color left">
        <figure class="icon-color"><img src="../image/hukai.png" alt="代替えテキスト" >    
        </figure>
        <div class="chatting-color">
          <p class="text-color">まじまじマジンガーーーーー</p>
        </div>
    </div>

    <div class="balloon-color left">
        <figure class="icon-color"><img src="../image/虎.jpg" alt="代替えテキスト" >    
        </figure>
        <div class="chatting-color">
          <p class="text-color">まじまじマジンガーーーーー</p>
        </div>
    </div>
    
    <footer>
        <div class="sendbox">
         <input type="textarea" value="" placeholder="Aa" name="sendtext" class="sendtext" style="width: 200px; height: 30px;">
         <button><img src="../image/send.png" alt="" class="sendimg"></button>
        </div>
    </footer>
</div>

</body>
</html>