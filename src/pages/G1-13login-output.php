<?php session_start(); ?>
<?php
const SERVER = "localhost";
const DBNAME = "destiny";
const USER = "root";
const PASS = "root";
$connect = "mysql:host=" . SERVER . ";dbname=" . DBNAME . ";charset=utf8";
//  require "../modules/DBconnect.php";

?>

<?php require "../modules/header.php"; ?>


<?php
unset($_SESSION['user']);
$pdo = new PDO($connect,USER,PASS);
    $sql = $pdo->prepare('select * from user where mail_address = ?');
    $sql->execute([$_POST["mail_address"]]);
    foreach($sql as $row){
        // if (password_verify($_POST['user_password'], $row['user_password'])) {
        if($row['user_password'] == $_POST['user_password']){
            $_SESSION['user']=[
                'id'=>$row['user_id'], 
                'password'=>$row['user_password'],
                'name'=>$row['user_name'],
                'tel'=>$row['user_tel'],
                'address'=>$row['mail_address'], 
                'sex'=>$row['user_sex'],
                'coordinate'=>$row['user_coordinate']];
        }
    }
    if(isset($_SESSION['user'])) {
        header('Location:G-6-1seach.php');
    }else {
        header('Location:G1-13login-input.php?hogeA=メールアドレスまたはパスワードが違います');
        exit;
    }

?>
</body>
</html>
<?php
 $pdo = null;   //DB切断
 ?>