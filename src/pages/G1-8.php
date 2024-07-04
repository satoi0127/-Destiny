<?php session_start(); ?>
<?php require '../modules/DBconnect.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['checkbox_values'] = isset($_POST['checkbox']) ? $_POST['checkbox'] : [];
    header('Location: G1-9.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/G1-8.css">
    <link rel="stylesheet" href="../css/border.css">
    <title>G1-8</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form action="G1-8.php" method="post" class="base">
        <progress class="prog" max="100" value="70">70%</progress><br>
        <button type="button" class="backbutton" onclick="history.back()">
            <img src="../image/left.png" class="left" width="15.56" height="25.68"><br>
        </button>
        <div class="subject">興味関心は？</div>
        <div class="text1">自分に最も合うと感じるものを、次の選択肢の中から5つまでお選びください</div>
        <hr size="1x" class="border2">
        <div class="container">
            <ul class="ks-cboxtags">
                

                <?php
                $pdo = new PDO($connect, USER, PASS);
                $sql = $pdo->query('SELECT * FROM interest');
                foreach($sql as $row){
                    echo '<li><input type="checkbox" id="checkbox'. $row['interest_id'] .'" class="check" name="checkbox[]" value="' . $row['interest_id'] . '"><label for="checkbox'. $row['interest_id'] .'">'. $row['interest_name'] .'</label></li>';
                }
                ?>

                <div class="space">　</div>
            <ul>
        </div>
        <hr size="1x" class="border2">    
        <button type="submit" class="button" id="nextButton"><div class="font" id="nextFont">次へ</div></button>
    </form>
    <script>
        $(document).ready(function(){
            $('.check').on('click', function() {
                var checkedCount = $('.check:checked').length;

                if (checkedCount > 5) {
                    $(this).prop('checked', false);
                    alert("5つまで選択できます。");
                }

                updateButtonState();
            });

            function updateButtonState() {
                var isChecked = $('.check:checked').length > 0;
                var nextButton = $('#nextButton');
                var nextFont = $('#nextFont');

                if (isChecked) {
                    nextButton.addClass('active');
                    nextFont.addClass('active');
                } else {
                    nextButton.removeClass('active');
                    nextFont.removeClass('active');
                }
            }

            updateButtonState();
        });
    </script>
</body>
</html>