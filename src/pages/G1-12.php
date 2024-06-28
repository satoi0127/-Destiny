<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/G1-12.css">
    <link rel="stylesheet" href="../css/border.css">
    <title>G1-12</title>
</head>
<body>
        <div class="base">
            <progress class="prog" max="100" value="100">100%</progress><br>
            <button type="button" class="backbutton" onclick="history.back()">
                <img src="../image/left.png" class="left" width="15.56" height="25.68"><br>
            </button>
            <div class="subject">Destiny</div>
            <div class="text1">本システムは位置情報を使用してマッチングを行います。ご理解の程よろしくお願いいたします。</div><br>
            <img src="../image/Destiny(black).png" class="earth" width="170" height="170">
            </div>
            <button type="button" class="nextbutton" id="nextButton" onclick="location.href='aa.html'"><div class="font" id="nextFont">Welcome to Destiny</div></button>
        </div>
    <script src="../js/test.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-pjax@2.0.1/jquery.pjax.min.js"></script>
    <script>
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
