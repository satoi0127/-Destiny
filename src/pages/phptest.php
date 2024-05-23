<?php require '../modules/DBconnect.php'; ?>
<?php require '../modules/header.php'; ?>

<?php

$pdo = new PDO($connect,USER,PASS);
    $sql = $pdo->query('select name from user');
    foreach($sql as $row){
        echo '<p>',$row,'</p>';
    }
?>


<?php require '../modules/footer.php'; ?>