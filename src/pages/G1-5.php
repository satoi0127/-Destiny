<?php session_start(); ?>
<!-- <php require '../modules/DBconnect.php'; ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/G1-5.css">
    <link rel="stylesheet" href="../css/border.css">
    <title>G1-5</title>
</head>
<body>
    <form action="G1-5.php" method="post" class="base">
        <progress class="prog" max="100" value="40">40%</progress><br>
        <button type="button" class="backbutton" onclick="history.back()">
            <img src="../image/left.png" class="left" width="15.56" height="25.68"><br>
        </button>
        <div class="subject">あなたの</div>
        <div class="subject">誕生日は？</div>
        <div class="input-group">
            <input type="tel" maxlength="1" class="birth-input" name="Y1" placeholder="Y">
            <input type="tel" maxlength="1" class="birth-input" name="Y2" placeholder="Y">
            <input type="tel" maxlength="1" class="birth-input" name="Y3" placeholder="Y">
            <input type="tel" maxlength="1" class="birth-input" name="Y4" placeholder="Y">
            <span>/</span>
            <input type="tel" maxlength="1" class="birth-input" name="M1" placeholder="M">
            <input type="tel" maxlength="1" class="birth-input" name="M2" placeholder="M">
            <span>/</span>
            <input type="tel" maxlength="1" class="birth-input" name="D1" placeholder="D">
            <input type="tel" maxlength="1" class="birth-input" name="D2" placeholder="D">
        </div>
        <div class="text1">プロフィールには誕生日ではなく、年齢が表示されます。</div>
        <button type="submit" class="nextbutton" id="nextButton"><div class="font" id="nextFont">次へ</div></button>
        <?php if (isset($error_message)) : ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var inputs = document.querySelectorAll('.birth-input');
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
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $year = $_POST['Y1'] . $_POST['Y2'] . $_POST['Y3'] . $_POST['Y4'];
    $month = $_POST['M1'] . $_POST['M2'];
    $day = $_POST['D1'] . $_POST['D2'];

    if (empty($year) || empty($month) || empty($day)) {
        $error_message = "すべてのフィールドを入力してください。";
    } elseif (!checkdate($month, $day, $year)) {
        $error_message = "有効な日付を入力してください。";
    } else {
        $birthday = new DateTime("$year-$month-$day");
        $today = new DateTime();
        $age = $today->diff($birthday)->y;

        $_SESSION['year'] = $year;
        $_SESSION['month'] = $month;
        $_SESSION['day'] = $day;
        $_SESSION['age'] = $age;

        header('Location: G1-6.php');
        exit;
    }
}
?>
