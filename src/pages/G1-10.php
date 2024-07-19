<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '../image/';
        $fileName = basename($_FILES['file']['name']);
        $uploadFile = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
            $_SESSION['file'] = $fileName;
            header('Location: G1-11.php'); // ファイルがアップロードされた後にリダイレクト
            exit();
        } else {
            echo "Failed to upload file: " . $fileName;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/G1-2.css">
    <link rel="stylesheet" href="../css/border.css">
    <title>G1-10</title>
    <style>
        input[type="file"] {
            display: none;
        }
    </style>
</head>
<body>
    <div class="base">
        <progress class="prog" max="100" value="90">90%</progress><br>
        <button type="button" class="backbutton" onclick="history.back()">
            <img src="../image/left.png" class="left" width="15.56" height="25.68"><br>
        </button>
        <div class="subject">自分自身について</div>
        <div class="subject">紹介しよう</div>
        <form id="uploadForm" action="G1-10.php" method="post" enctype="multipart/form-data" class="base">
            <div class="column1">
                <div class="image1">
                    <?php
                    echo "　　　　";
                    if (isset($_SESSION['file'])) {
                        echo "<img src='../image/" . $_SESSION['file'] . "' alt='Uploaded Image' class='insert_image' width='250' height='250'>";
                    } else {
                        echo "<img src='../image/Gray.png' alt='Default Image' class='gray_image' width='250' height='250'>";
                    }
                    ?>
                    <input type="file" id="file" name="file">
                    <label for="file" class="custom-file-upload">
                        <img src="../image/plus.png" alt="Upload Button" width='40' height='40'>
                    </label>
                </div>
            </div>
            <button type="submit" class="nextbutton" id="nextButton"><div class="font" id="nextFont">次へ</div></button>
        </form>
    </div>

    <script>
        document.getElementById('file').addEventListener('change', function() {
            document.getElementById('uploadForm').submit();
        });

        window.addEventListener('load', function() {
            var nextButton = document.getElementById('nextButton');
            var nextFont = document.getElementById('nextFont');
            <?php if (isset($_SESSION['file'])): ?>
                nextButton.classList.add('active');
                nextFont.classList.add('active');
                nextButton.addEventListener('click', function() {
                    window.location.href = 'G1-11.php';
                });
            <?php endif; ?>
        });
    </script>
</body>
</html>
