<?php
const SERVER = "localhost";
const DBNAME = "destiny";
const USER = "root";
const PASS = "root";
$connect = "mysql:host=" . SERVER . ";dbname=" . DBNAME . ";charset=utf8";
//test
?>

<?php require "../modules/header.php"; ?>

<link rel="stylesheet" href="../css/G-6-1 search.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
    <a href="javascript:history.back();" class="arrow_btn arrow_01"></a>

    <div class="form">
        <form method="post" id="form2" action="G-6-1seach.php">
            <input id="sbox3" name="keyword" type="text" placeholder="キーワードを入力">
            <button id="sbtn4" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            <!-- <link href="https://fonts.googleapis.com/earlyaccess/hannari.css" rel="stylesheet"> -->

        </form>
    </div>

    <?php


    // データベース接続を確立する
    $pdo = new PDO($connect,USER,PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['keyword'])) {
        $keyword = $_POST['keyword'];

        // SQLクエリの準備
        $sql = $pdo->prepare("
            

             SELECT u.user_name, i.interest_name, p.user_profile_image_path, u.user_id
            FROM user u
            JOIN userinterest ui ON u.user_id = ui.user_id
            JOIN interest i ON ui.interest_id = i.interest_id
            JOIN profile p ON u.user_id = p.user_id
            WHERE u.user_name LIKE ? OR i.interest_name LIKE ?
            GROUP BY u.user_id;
        ");
        $sql->execute(['%' . $keyword . '%', '%' . $keyword . '%']);
    } else {
        // 検索キーワードがない場合、全てのレコードを取得
        $sql = $pdo->query("
            SELECT DISTINCT u.user_name, i.interest_name, p.user_profile_image_path, u.user_id
            FROM user u
            JOIN userinterest ui ON u.user_id = ui.user_id
            JOIN interest i ON ui.interest_id = i.interest_id
            JOIN profile p ON u.user_id = p.user_id
            GROUP BY u.user_id;

        ");
    }

    $results = $sql->fetchAll();
    // var_dump($results);

    // 検索結果を表示する
    if ($results) {
        echo "<h2>Search Results:</h2>";
        foreach ($results as $row) {
            $image = "../image/";
            $a= $row['user_id'];
            echo "<div class='box' data-id='".$a."'>";
            echo "<img src=  '" . $image . htmlspecialchars($row["user_profile_image_path"]) . "' alt='Profile Image'></p><hr>";
            echo "<div class='text'>";
            echo "<p>Name: " . htmlspecialchars($row["user_name"]) . "<br>";
            echo "<p>Hobby: " . htmlspecialchars($row["interest_name"]) . "<br>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "No results found.";
    }

?>
<?php require 'G0-0footer.php'; ?>

    </body>
    </html>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery-pjax@2.0.1/jquery.pjax.min.js"></script> -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="http://localhost/src/javascript/G-6-1seach.js"></script>

    <!-- // SELECT DISTINCT u.user_name, i.interest_name, p.user_profile_image_path, u.user_id
            // FROM user u
            // JOIN userinterest ui ON u.user_id = ui.user_id
            // JOIN interest i ON ui.interest_id = i.interest_id
            // JOIN profile p ON u.user_id = p.user_id
            // WHERE u.user_name LIKE ? OR i.interest_name LIKE ? -->