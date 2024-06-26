<?php session_start(); ?>
<?php require "../modules/DBconnect.php"; ?>
<?php
    $pdo = new PDO($connect,USER,PASS);
    $userid = $_SESSION['user']['id'];
    $sql = $pdo->prepare('update profile set user_starsign = ?,user_height = ?,user_blood_type =?,user_purpose =?,user_description=? where user_id = ?');
    $sql->execute([$_POST['star'],$_POST['height'],$_POST['Blood'],$_POST['purpose'],$_POST['self'],$userid]);

    foreach($_POST['interest'] as $choice){
    $userint = $pdo->prepare('INSERT INTO userInterest(uinterest_id, user_id, interest_id) VALUES (null,?,?)');
    $userint -> execute($userid,$choice);
    }
    $userint2 = $pdo->prepare('select * from userInterest where user_id = ?');
    $userint2 -> execute([$userid]);
        foreach($userint2 as $value){
            foreach($_POST['interest'] as $choice){
            if($choice != $value['interest_id']){
                
            }
            $intid[] =$value['interest_id']; 
            }

        }
    // foreach($_POST['interest'] as $choice){
    //     print "you want $choice .<br/>";
    //   }
    // echo $userid;
    // echo '自己紹介：'.$_POST['self'].'<br>';
    // echo '星座：'.$_POST['star'].'<br>';
    // echo '身長：'.$_POST['height'].'<br>';
    // echo '血液型：'.$_POST['Blood'].'<br>';
    // echo '目的：'.$_POST['purpose'].'<br>';
    header('Location:../pages/G-4-1.php');
?>