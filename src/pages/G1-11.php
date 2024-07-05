<?php session_start();
    require '../modules/DBconnect.php';
    $selected_interests = isset($_SESSION['selected_interests']) ? $_SESSION['selected_interests'] : [];

    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare('INSERT INTO user (user_password, user_name, user_tel, mail_address, user_sex, user_age) VALUES (?, ?, ?, ?, ?, ?)');
        $sql->execute([$_SESSION['password'], $_SESSION['user_name'], $_SESSION['phone_number'], $_SESSION['email'], $_SESSION['sex'], $_SESSION['age']]);

        $user_id = $pdo->lastInsertId();

        $sql = $pdo->prepare('INSERT INTO userInterest (user_id, interest_id) VALUES (?, ?)');
        foreach ($_SESSION['checkbox_values'] as $interest_id) {
            $sql->execute([$user_id, $interest_id]);
        }

        $image_num = 1+($user_id%5);
        $default_pfp = "default".$image_num.".png";

        $sql = $pdo->prepare("INSERT INTO profile(user_id, user_profile_image_path, user_description, user_starsign, user_blood_type ,user_purpose, user_height) values(?,?,'ユーザーは自己紹介文を書いていません',?,?,?,?)");
        $sql->execute([$user_id, $default_pfp, 255, 255, 255, 16]);

    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

    foreach ($sql as $row) {
            $_SESSION['user'] = [
                'id' => $row['user_id'],
                'password' => $row['user_password'],
                'name' => $row['user_name'],
                'tel' => $row['user_tel'],
                'address' => $row['mail_address'],
                'sex' => $row['user_sex'],
                'coordinate_latitude' => $row['user_coordinate_latitude'],
                'coordinate_longitude' => $row['user_coordinate_longitude'],
                'current_country' => $row['user_current_country'],
                'current_city' => $row['user_current_city'],
                'current_province' => $row['user_current_province'],
                'current_suburb' => $row['user_current_suburb'],
                'age' => $row['user_age'],
    
            ];
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/G1-11.css">
    <link rel="stylesheet" href="../css/border.css">
    <title>G1-11</title>
</head>
<body>
        <div class="base">
            <progress class="prog" max="100" value="100">100%</progress><br>
            <button type="button" class="backbutton" onclick="history.back()">
                <img src="../image/left.png" class="left" width="15.56" height="25.68"><br>
            </button>
            <div class="subject">位置情報の使用</div>
            <div class="text1">本システムは位置情報を使用してマッチングを行います。ご理解の程よろしくお願いいたします。</div><br>
            <img src="../image/earth.png" class="earth" width="200" height="200">
            </div>
            <button type="button" class="nextbutton" id="nextButton" onclick="location.href='G1-12.php'"><div class="font" id="nextFont">許可</div></button>
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