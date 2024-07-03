<?php if(session_status() === PHP_SESSION_NONE)session_start(); ?>
<?php

function showparty($connect,$party_id){

$pdo = new PDO($connect,USER,PASS);
$sql = $pdo->prepare("select * from party_message where party_id = ?");
$sql->execute([$party_id]);
$users = $pdo->prepare('SELECT * FROM user where user_id IN (SELECT user_id FROM party_member where party_id = ?)');
$users->execute([$party_id]);
$users = $users->fetchAll();

foreach($sql as $query){

    $message_uid = $query['user_id'];
    $img_path = $pdo->prepare("select user_profile_image_path from profile where user_id = ?");
    $img_path->execute([$message_uid]);
    $img_path = $img_path->fetchAll()[0]['user_profile_image_path'];
    

    if($_SESSION['user']['id'] == $query['user_id']){
        echo'<div class="balloon-color right">
        <div class="chatting-color">
        <p class="text-color">',$query['party_message'],'</p>
        </div>
        </div>';
    }else{
        echo'<div class="balloon-color left">
        <figure class="icon-color"><img src="../image/',$img_path,'" alt="代替えテキスト" >    
        </figure>
        <div class="chatting-color">
        <p class="text-color">',$query['party_message'],'</p>
        </div>
        </div>';
    
    }
    
    //echo "</div>";
}

}

?>