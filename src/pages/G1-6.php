<!-- <php require '../modules/DBconnect.php'; ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/G1-4.css">
    <link rel="stylesheet" href="../css/border.css">
    <title>G1-6</title>
</head>
<body>
            <progress class="prog" max="100" value="50">50%</progress><br>
            <button type="button" class="backbutton" onclick="history.back()">
                <img src="../image/left.png" class="left" width="15.56" height="25.68"><br>
            </button>
            <div class="subject">マッチしたい人は？</div>
            <div class="text1">自分に最も合うと感じるものを、次の選択肢の中から１つお選びください</div>

            <form action="G1-7.php" method="post" class="form">
                <div class="inputGroup">
                    <input id="man" name="check" class="check" type="checkbox" />
                    <label for="man"><div class="font2">男性</div></label>
                </div>
                
                <div class="inputGroup">
                    <input id="woman" name="check" class="check" type="checkbox" />
                    <label for="woman"><div class="font2">女性</div></label>
                </div>

                <div class="inputGroup">
                    <input id="other" name="check" class="check" type="checkbox" />
                    <label for="other"><div class="font2">みんな</div></label>
                </div>          
            <button type="submit" class="button" id="nextButton"><div class="font" id="nextFont">次へ</div></button>
            </form>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-pjax@2.0.1/jquery.pjax.min.js"></script>
<script>
    $(document).ready(function(){
        $('.check').on('click', function() {
            if ($(this).prop('checked')) {
                // 他のチェックボックスをクリア
                $('.check').not(this).prop('checked', false);
            }
            updateButtonState();
        });
        function updateButtonState() {
                var isChecked = $('.check').is(':checked');
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
        });

</script>
<?php
    session_start();
    $year = $_POST['Y1'] . $_POST['Y2'] . $_POST['Y3'] . $_POST['Y4'];
    $month = $_POST['M1'] . $_POST['M2'];
    $day = $_POST['D1'] . $_POST['D2'];

    $_SESSION['year'] = $year;
    $_SESSION['month'] = $month;
    $_SESSION['day'] = $day;
?>
</body>
</html>
