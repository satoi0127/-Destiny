<?php session_start();?>
<!-- <php require '../modules/DBconnect.php'; ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/G1-3.css">
    <link rel="stylesheet" href="../css/border.css">
    <title>G1-3</title>
</head>
<body>
    <form action="G1-3.php" method="post" class="base">
            <progress class="prog" max="100" value="20">20%</progress><br>
        <button type="button" class="backbutton" onclick="history.back()">
            <img src="../image/left.png" class="left" width="15.56" height="25.68"><br>
        </button>
        <div class="subject">個人情報を</div>
        <div class="subject">入力してください</div>
        <div class="text3">メールアドレスを入力してください</div>
        <input type="email" class="textbox" id="nextEmail" name="email">
        <div class="text3">パスワードを入力してください</div>
        <input type="password" class="textbox" id="nextPassword1">
        <div class="text3">もう一度パスワードを入力してください</div>
        <input type="password" class="textbox" id="nextPassword2" name="password">
        <button type="button" class="nextbutton" id="nextButton" onclick="location.href='G1-4.php'"><div class="font" id="nextFont">次へ</div></button>
    </form>
<script src="../js/test.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-pjax@2.0.1/jquery.pjax.min.js"></script>
<script>
    var Email = document.getElementById('nextEmail');
    var Password1 = document.getElementById("nextPassword1");
    var Password2 = document.getElementById("nextPassword2");
    var nextbutton = document.getElementById('nextButton');
    var font = document.getElementById('nextFont');

    function updateButtonState() {
        if (Password1.value === Password2.value && Password1.value.trim() !== "") {
            nextbutton.classList.add('active');
            font.classList.add('active');
        } else {
            nextbutton.classList.remove('active');
            font.classList.remove('active');
        }
    }

    Password1.addEventListener('focus', function(){
        if (!Email.value.match(/.+@.+\..+/)) {
            window.alert('メールアドレスの書式が間違っています'); 
            Email.focus();
        }
    });

    Password1.addEventListener('input', updateButtonState);
    Password2.addEventListener('input', updateButtonState);
</script>
</body>
</html>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        header('Location: G1-4.php');
        exit;
    }
?>