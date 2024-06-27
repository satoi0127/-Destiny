<?php session_start();?>
<!-- <php require '../modules/DBconnect.php'; ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/G1-2.css">
    <link rel="stylesheet" href="../css/border.css">
    <title>G1-2</title>
</head>
<body>
    <form action="G1-2.php" method="post" class="base">
        <progress class="prog" max="100" value="10">10%</progress><br>
        <button type="button" class="backbutton" onclick="history.back()">
            <img src="../image/left.png" class="left" width="15.56" height="25.68"><br>
        </button>
        <div class="subject">あなたの名前は？</div>
        <input type="text" class="textbox" id="nameTextbox" name="name">
        <div class="text1">プロフィールにはこの名前がそのまま表示されます。</div>
        <div class="text2">悪意のある名前を使用しないようにお気を付けください。</div>
        <button type="submit" class="nextbutton" id="nextButton"><div class="font" id="nextFont">次へ</div></button>
    </div>
<script>
        var textbox = document.getElementById('nameTextbox');
        var nextbutton = document.getElementById('nextButton');
        var font = document.getElementById('nextFont');

        textbox.addEventListener('input', function() {
            if (textbox.value.trim() !== "") {
                nextbutton.classList.add('active');
                font.classList.add('active');
            } else {
                nextbutton.classList.remove('active');
                font.classList.remove('active');
            }
        });
</script>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['user_name'] = $_POST['name'];
    header('Location: G1-3.php');
    exit;
}
?>