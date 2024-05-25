<?php require '../modules/DBconnect.php'; ?>
<?php require '../modules/header.php'; ?>

<?php

    $pdo = new PDO($connect,USER,PASS);
    $sql = $pdo->query('select interest_name from interest');
    foreach($sql as $row){
        echo '<p>',$row,'</p>';
    }

    echo 'test';

    
?>


<?php require '../modules/footer.php'; ?>