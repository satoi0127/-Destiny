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
        <div class="base">
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
            <div class="text2">数字11桁を入力してください。、</div>
            <button type="button" class="nextbutton" id="nextButton" onclick="location.href='G1-10.php'"><div class="font" id="nextFont">次へ</div></button>
        </div>
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
    session_start();
    
?>
</body>
</html>
