<?php if(session_status() === PHP_SESSION_NONE)session_start(); ?>
<?php

function showchat($connect,$chatroom_id){

$pdo = new PDO($connect,user,pass);
$sql = $pdo->prepare("select * from message where chatroom_id = ?");
$sql->execute([$chatroom_id]);
$users = $pdo->prepare('SELECT * FROM user where user_id IN (SELECT user_id FROM chatroom where chatroom_id = ?)');
$users->execute([$chatroom_id]);
$users = $users->fetchAll();

foreach($sql as $query){

    $message_uid = $query['user_id'];
    $img_path = $pdo->prepare("select user_image_path from user where user_id = ?");
    $img_path->execute([$message_uid]);
    $img_path = $img_path->fetchAll()[0]['user_image_path'];
    

    echo '<div style="width=100%; height=48px; border: 1px solid black;">';

    if($_SESSION['user']['user_id'] == $query['user_id']){
        echo '<p style=""><img class="icon_small" src="uploads/',$img_path,'" alt="">',$query['message_data'],'</p>';
    }else{
        echo '<p style=""><img class="icon_small" src="uploads/',$img_path,'" alt="">',$query['message_data'],'</p>';
    }
    
    echo '</div>';

    //echo "</div>";
}

}

?>