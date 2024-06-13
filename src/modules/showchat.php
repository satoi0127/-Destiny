<?php if(session_status() === PHP_SESSION_NONE)session_start(); ?>
<?php

function showchat($connect,$chatroom_id){

$pdo = new PDO($connect,USER,PASS);
$sql = $pdo->prepare("select * from Message where chatmember_id = ?");
$sql->execute([$chatroom_id]);
$users = $pdo->prepare('SELECT * FROM user where user_id IN (SELECT user_id FROM chatmember where chatmember_id = ?)');
$users->execute([$chatroom_id]);
$users = $users->fetchAll();

foreach($sql as $query){

    $message_uid = $query['user_id'];
  
    

    if($_SESSION['user']['user_id'] == $query['user_id']){
        echo'<div class="balloon-color right">
        <div class="chatting-color">
        <p class="text-color">',$query['message_text'],'</p>
        </div>
        </div>';
    }else{
        echo'<div class="balloon-color left">
        <figure class="icon-color"><img src="../image/hukai.png" alt="代替えテキスト" >    
        </figure>
        <div class="chatting-color">
        <p class="text-color">',$query['message_text'],'</p>
        </div>
        </div>';
    
    }
    
    //echo "</div>";
}

}

?>