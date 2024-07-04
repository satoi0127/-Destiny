<?php
    session_start();
    require '../modules/DBconnect.php';

    // DB接続情報がDBconnect.phpで定義されていることを前提とします
    $pdo = new PDO($connect, USER, PASS);

    // パーティーデータの取得
    $sql = $pdo->prepare("SELECT * FROM party");
    $sql->execute([]);

?>
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
    <!-- <a href="./G-4-1.php" class="arrow_btn arrow_01"></a> -->
    <br><h2>パーティー</h2>
    <hr>
    
    <?php foreach ($sql as $results): ?>
        <div class="party-item">
            <form action="G-3-4.php" method="post">
                <input type="hidden" name="party_id" value="<?= $results['party_id'] ?>">
                <h3><?= $results['party_name'] ?></h3>
                <p class="description"><?= $results['party_description'] ?></p>
                <div class="interests">
                    <?php
                        $sql2 = $pdo->prepare('SELECT interest_id FROM partyInterest WHERE party_id = ?');
                        $sql2->execute([$results['party_id']]);
                        foreach ($sql2 as $row) {
                            $sql3 = $pdo->prepare('SELECT * FROM interest WHERE interest_id = ?');
                            $sql3->execute([$row['interest_id']]);
                            foreach ($sql3 as $row2) {
                                echo '<span class="interest">#' . $row2['interest_name'] . '</span>';
                            }
                        }
                    ?>
                </div>

                <div class="members">
                    <?php
                        $members = $pdo->prepare("SELECT user_id FROM party_member WHERE party_id = ?");
                        $members->execute([$results['party_id']]);
                        foreach ($members as $users) {
                            $query = $pdo->prepare("SELECT user_profile_image_path FROM profile WHERE user_id = ?");
                            $query->execute([$users['user_id']]);
                            $imagepath = $query->fetchAll()[0]['user_profile_image_path'];
                            echo '<img class="user_img" src="../image/' . $imagepath . '" alt="">';
                        }
                    ?>
                </div>

                <button type="submit" class="chat">チャット開始</button>
            </form>
        </div>
    <?php endforeach; ?>

    <div onclick="location.href='./G-3-2party.php'" class="post-btn">
        <i class="fas fa-plus"></i>
    </div>
    <div style="height:20vh;"></div> <!-- フッターとの重なりを防止 -->
    <?php require 'G0-0footer.php'; ?>
</body>
</html>
