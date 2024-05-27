<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<a href="#" class="arrow_btn arrow_01"></a>

<div class="form">
<form method="post" id="form2" action="G-6-2 serch_result.php">
    <input id="sbox3" name="keyword" type="text" placeholder="キーワードを入力">
    <button id="sbtn4" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    <!-- <link href="https://fonts.googleapis.com/earlyaccess/hannari.css" rel="stylesheet"> -->
</form>
</div>

<?php
$pdo=new PDO($connect,USER,PASS);
if(isset($_POST['keyword'])){
$sql=$pdo->prepare('select usr.usr_name AS user_name , interest.interest_name AS interest_name 
                    from userinterest
                    Join user On userinterest.user_id = user_id
                    Join interest On userinterest.interest_id = interest_id
                    where user_name like ? And interest_name like ?');
$sql->execute(['%'.$_POST['keyword'].'%']);
}else{
    echo "No results found.";
}
?>
<?php require 'footer.php'; ?>


