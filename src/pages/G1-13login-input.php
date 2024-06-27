<?php require "../modules/header.php"; ?>

<link rel="stylesheet" href="../css/login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">ログイン</h2>
    <form action="G1-13login-output.php" method="post">

    <?php unset($_SESSION['user']); ?>

    <div class="login-container">
    <p><input type="email" name="mail_address" placeholder="メールアドレス" required></p>
    <p><input type="password" name="user_password" placeholder="パスワード" required></p>
    <p><input type="submit" value="ログイン"></p>
    <label>アカウント新規作成は<a href="signin_temp.php">こちら</a></label>

    </div>
   <?php
  if(isset($_GET['hogeA'])){
        echo '<p style="color:red">',htmlspecialchars($_GET['hogeA']),'</p>';
    }else{
        echo '<p style="color:red"><br></p>';
    }
?>
    </form>
    </div>
</body>
</html>
