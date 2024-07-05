<?php session_start(); ?>
<?php require '../modules/DBconnect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="../css/G-3-2.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>パーティー</title>
</head>
<body>
    <a href="./G-3-1party.php" class="arrow_btn arrow_01"></a>
    <form method="POST" action="G-3-4.php">
    <input type="hidden" name="host_id" value=<?=$_SESSION['user']['id']?>> 
    <div class="container">
        <h3>パーティー名</h3>
        <input type="text" name="party_name"> 
        <h3>詳細（任意）</h3>
        <!--<textarea name="msg" cols=25 rows=5  name="party_description">
            ここに記入してください
        </textarea> -->
        <p><input type="text" class="large-input" name="party_description"></p>  
        <div class="modal_wrap">
        
            <div class="modal_overlay">
                <label for="trigger" class="modal_trigger"></label>
                    <div id="buttonContainer">
                        <h2>趣味一覧</h2>
                    </div>
                    <center>
                    <a href="#modal-01" class="modal-button">
                    趣味一覧を表示
                    </a>
                    </center>
                    <div class="modal-wrapper" id="modal-01">
                    <a href="#!" class="modal-overlay"></a>
                        <div class="modal-window">
                            <div class="modal-content">
                    <p class="modal_title">趣味一覧</p>
                    <div class="container1">
                    <ul class="ks-cboxtags">
                                <?php
                                    $pdo = new PDO($connect,USER,PASS);
                                    $sql = $pdo->query('select * from interest');
                                    foreach($sql as $row){
                                        echo '<li><input type="checkbox" name="interest[]" id="checkbox'. $row['interest_id'] .'" class="check" name="checkbox[]" value="' . $row['interest_id'] . '"><label for="checkbox'. $row['interest_id'] .'">'. $row['interest_name'] .'</label></li>';
                                    //echo '<input type="checkbox" name="interest[]"  id="la'.$row['interest_id'].'" value="'.$row['interest_id'].'"><label class="syumi3" for="la'.$row['interest_id'].'">'. $row['interest_name'].'</label>';
                                }
                                ?> 
                                 <div class="space">　</div>
                                <ul>
                    </div>
                            </div>
                            <a href="#!" class="modal-close"><i class="far fa-times-circle"></i></a>
                        </div>    
                    </div>    
                <input type="submit" class="chat" value="作成" />
            </div>
        </div>    
    </div>
    </form>
    <div style="height:10vh;"></div> <!--フッターメニューにめり込まないように余白-->


</body>
</html>