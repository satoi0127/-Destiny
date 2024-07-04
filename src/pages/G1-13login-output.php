<?php

session_start();

require "../modules/DBconnect.php";

unset($_SESSION['user']);
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('select * from user where mail_address = ?');
$sql->execute([$_POST["mail_address"]]);
foreach ($sql as $row) {
    // if (password_verify($_POST['user_password'], $row['user_password'])) {
    if ($row['user_password'] == $_POST['user_password']) {
        $_SESSION['user'] = [
            'id' => $row['user_id'],
            'password' => $row['user_password'],
            'name' => $row['user_name'],
            'tel' => $row['user_tel'],
            'address' => $row['mail_address'],
            'sex' => $row['user_sex'],
            'coordinate_latitude' => $row['user_coordinate_latitude'],
            'coordinate_longitude' => $row['user_coordinate_longitude'],
            'current_country' => $row['user_current_country'],
            'current_city' => $row['user_current_city'],
            'current_province' => $row['user_current_province'],
            'current_suburb' => $row['user_current_suburb'],
            'age' => $row['user_age'],

        ];

    }
}


if (isset($_SESSION['user'])) {
    header('Location:G-2-1destinyAll.php');
    exit();
} else {
    header('Location:G1-13login-input.php?hogeA=メールアドレスまたはパスワードが違います');
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>ログイン</title>
</head>
<body>
</body>
</html>
