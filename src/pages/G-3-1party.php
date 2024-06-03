<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="../css/G-3-1.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>パーティー</title>
</head>
<body>
    <div class="container">
    <?php require 'DBconnect.php'; ?>
        <img src="../image/hukai.png" alt="写真" class="photo">
        <div class="text">
            <input type="text" placeholder="パーティー名">
        </div>
        <input type="text" placeholder="詳細" class="textbox">
        <input type="text" placeholder="メンバー" class="textboxb">
    </div>
    <div onclick="location.href='./G-3-2party.php'" class="post-btn">
    <i class="fas fa-plus"></i>
    </div>
    <?php require 'G0-0footer.php'; ?>
    
</body>
</html>