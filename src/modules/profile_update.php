<?php session_start(); ?>
<?php require "../modules/DBconnect.php"; ?>
<?php
    $pdo = new PDO($connect,USER,PASS);
    $userid = $_SESSION['user']['id'];
    $sql = $pdo->prepare('update profile set user_starsign = ?,user_height = ?,user_blood_type =?,user_purpose =?,user_description=? where user_id = ?');
    $sql->execute([$_POST['star'],$_POST['height'],$_POST['Blood'],$_POST['purpose'],$_POST['self'],$userid]);

    foreach($_POST['interest'] as $choice){
    // $userint = $pdo->prepare('INSERT INTO userInterest(uinterest_id, user_id, interest_id) VALUES (null,?,?)');
    // $userint -> execute([$userid,$choice]);
    $int2[] = $choice;
    }
    $userint2 = $pdo->prepare('select * from userInterest where user_id = ?');
    $userint2 -> execute([$userid]);
    foreach($userint2 as $value){
            $int1[] = $value['interest_id'];
    }

    $int2_diff = array_diff($int2,$int1);
    foreach($int2_diff as $val2){
      // echo $val;
      // echo '<br>';
      $userint = $pdo->prepare('INSERT INTO userInterest(uinterest_id, user_id, interest_id) VALUES (null,?,?)');
      $userint -> execute([$userid,$val2]);
      }

    $int1_diff = array_diff($int1,$int2);
    foreach($int1_diff as $val){
      // echo $val;
      // echo '<br>';
      $userdelete = $pdo->prepare('DELETE FROM userInterest WHERE user_id=? and interest_id=?');
      $userdelete -> execute([$userid,$val]);
      }
    //   echo'int2';
    //   echo'<br>';
    // foreach($int2 as $choice){
    //     echo $choice;
    //     echo'<br>';
    //   }
    //   echo'int1';
    //   echo'<br>';
    //   foreach($int1 as $cho){
    //     echo $cho;
    //     echo'<br>';
    //   }
    // echo $userid;
    // echo '自己紹介：'.$_POST['self'].'<br>';
    // echo '星座：'.$_POST['star'].'<br>';
    // echo '身長：'.$_POST['height'].'<br>';
    // echo '血液型：'.$_POST['Blood'].'<br>';
    // echo '目的：'.$_POST['purpose'].'<br>';
    header('Location:../pages/G-4-1.php');
?>