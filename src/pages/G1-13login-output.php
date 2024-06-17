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
} else {
    header('Location:G1-13login-input.php?hogeA=メールアドレスまたはパスワードが違います');
}
?>
<?php
$pdo = null; // DB切断
?>
