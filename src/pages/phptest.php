<?php require '../modules/DBconnect.php'; ?>
<?php require '../modules/header.php'; ?>
<link rel="stylesheet" href="../css/style.css">

<?php

    $pdo = new PDO($connect,USER,PASS);
    $sql = $pdo->query('select * from interest');
    foreach($sql as $row){
        echo '<button class="interest_blob">',$row['interest_name'],'</button>';
    }

    echo 'test';

    
?>


<?php require '../modules/footer.php'; ?>