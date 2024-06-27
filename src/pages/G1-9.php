<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/G1-9.css">
    <link rel="stylesheet" href="../css/border.css">
    <title>G1-9</title>
</head>
<body>
    <form action="G1-9.php" method="post" class="base">
        <progress class="prog" max="100" value="80">80%</progress><br>
        <button type="button" class="backbutton" onclick="history.back()">
            <img src="../image/left.png" class="left" width="15.56" height="25.68"><br>
        </button>
        <div class="subject">電機番号を</div>
        <div class="subject">入力してください</div>
        <div class="input-group">
            <input type="tel" maxlength="1" name="n1" class="phonumber" placeholder="N">
            <input type="tel" maxlength="1" name="n2" class="phonumber" placeholder="N">
            <input type="tel" maxlength="1" name="n3" class="phonumber" placeholder="N">
            <span>-</span>
            <input type="tel" maxlength="1" name="n4" class="phonumber" placeholder="N">
            <input type="tel" maxlength="1" name="n5" class="phonumber" placeholder="N">
            <input type="tel" maxlength="1" name="n6" class="phonumber" placeholder="N">
            <input type="tel" maxlength="1" name="n7" class="phonumber" placeholder="N">
            <span>-</span>
            <input type="tel" maxlength="1" name="n8" class="phonumber" placeholder="N">
            <input type="tel" maxlength="1" name="n9" class="phonumber" placeholder="N">
            <input type="tel" maxlength="1" name="n10" class="phonumber" placeholder="N">
            <input type="tel" maxlength="1" name="n11" class="phonumber" placeholder="N">
        </div>
        <div class="text1">電話番号として使用される、</div>
        <div class="text2">数字11桁を入力してください。</div>
        <button type="submit" class="nextbutton" id="nextButton"><div class="font" id="nextFont">次へ</div></button>
    </form>
    <script src="../js/test.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-pjax@2.0.1/jquery.pjax.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var inputs = document.querySelectorAll('.phonumber');
            var nextButton = document.getElementById('nextButton');
            var nextFont = document.getElementById('nextFont');

            function checkInputs() {
                for (var i = 0; i < inputs.length; i++) {
                    if (inputs[i].value === '') {
                        nextButton.classList.remove('active');
                        nextFont.classList.remove('active');
                        return;
                    }
                }
                nextButton.classList.add('active');
                nextFont.classList.add('active');
            }

            inputs.forEach((input, index) => {
                input.addEventListener('input', function() {
                    // 入力が数字でない場合、入力をクリア
                    if (!/^\d$/.test(input.value)) {
                        input.value = '';
                        return;
                    }
                    if (input.value.length === 1 && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                    checkInputs();
                });

                input.addEventListener('keydown', function(event) {
                    if (event.key === 'Backspace' && input.value.length === 0 && index > 0) {
                        inputs[index - 1].focus();
                    }
                    checkInputs();
                });
            });
        });
    </script>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone_number = $_POST['n1'] . $_POST['n2'] . $_POST['n3'] . $_POST['n4'] . $_POST['n5'] . $_POST['n6'] . $_POST['n7'] . $_POST['n8'] . $_POST['n9'] . $_POST['n10'] . $_POST['n11'];
    $_SESSION['phone_number'] = $phone_number;
    header('Location: G1-10.php');
    exit;
}
?>
</body>
</html>
