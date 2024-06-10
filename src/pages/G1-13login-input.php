<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ログイン</title>
</head>
<body>
    <form action="G1-13login-output.php" method="post">
<?php
    echo '<div class="field">';
    echo '<input type="email" name="mail_address" placeholder="メールアドレス" required>';
    echo '</div>';

    echo '<div class="field">';
    echo '<input type="password" name="user_password" placeholder="パスワード" required>';
    echo '</div>';

    echo '<div class="field">';    
    echo '<button type="submit">ログイン</button>';
    echo '</div>';
        
   
?>
    </form>
</body>
</html>
