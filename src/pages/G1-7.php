<?php session_start();?>
<?php require '../modules/DBconnect.php'; ?>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['distance'] = $_POST['distance'];
        header('Location: G1-8.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/G1-7.css">
    <link rel="stylesheet" href="../css/border.css">
    <title>G1-7</title>
</head>
<body>
    <form action="G1-7.php" method="post" class="base">
        <progress class="prog" max="100" value="60">60%</progress><br>
            <button type="button" class="backbutton" onclick="history.back()">
                <img src="../image/left.png" class="left" width="15.56" height="25.68"><br>
            </button>
            <div class="subject">出会いたい</div>
            <div class="subject">相手との距離は？</div>
            <div class="text1">スライダーを使って、検索する相手がいる</div>
            <div class="text2">距離の最大範囲を設定します。</div><br>
            <div class="distance-container">
                <div class="text3">距離</div>
                <div class="value"><output id="value" name="distance"></output>km</div>
            </div>
            <input type="range" min="0" max="100" step="1" value="50" class="distance" id="distance" name="distance">
            <button type="submit" class="nextbutton" id="nextButton"><div class="font" id="nextFont">次へ</div></button>
    </form>
    <script src="../js/test.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-pjax@2.0.1/jquery.pjax.min.js"></script>
    <script>
        const value = document.querySelector("#value");
        const input = document.querySelector("#distance");
        value.textContent = input.value;
        input.addEventListener("input", (event) => {
            value.textContent = event.target.value;
        });

        var textbox = document.getElementById('nameTextbox');
        var nextbutton = document.getElementById('nextButton');
        var font = document.getElementById('nextFont');
        var none = 0;

            if (none == 0) {
                nextbutton.classList.add('active');
                font.classList.add('active');
            };
    </script>
</body>
</html>