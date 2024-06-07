<?php require '../modules/header.php'; ?>
<link rel="stylesheet" href="../css/style.css">

<?php

const SERVER = "localhost";
const DBNAME = "destiny";
const USER = "root";
const PASS = "root";
$connect = "mysql:host=" . SERVER . ";dbname=" . DBNAME . ";charset=utf8";

    $pdo = new PDO($connect,USER,PASS);
    $sql = $pdo->query('select * from interest');
    foreach($sql as $row){
        echo '<button class="interest_blob">',$row['interest_name'],'</button>';
    }

    echo 'test';

    
?>

</body>
</html>