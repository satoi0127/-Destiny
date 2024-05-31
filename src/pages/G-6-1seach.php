<?php
const SERVER = "localhost";
const DBNAME = "destiny";
const USER = "root";
const PASS = "root";
$connect = "mysql:host=" . SERVER . ";dbname=" . DBNAME . ";charset=utf8";
//test
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- <meta charset="UTF-8"> -->
 <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
 <link rel="stylesheet" href="../css/G-6-1 search.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>kaihatu</title>
</head>
<body>
    
    <a href="javascript:history.back();" class="arrow_btn arrow_01"></a>

    <div class="form">
        <form method="get" id="form2" action="G-6-1serch.php">
            <input id="sbox3" name="keyword" type="text" placeholder="キーワードを入力">
            <button id="sbtn4" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            <!-- <link href="https://fonts.googleapis.com/earlyaccess/hannari.css" rel="stylesheet"> -->

        </form>
    </div>

    <?php
        // $pdo=new PDO($connect,USER,PASS);
        // if(isset($_POST['keyword'])){
        // $sql=$pdo->prepare('select usr.usr_name AS user_name , interest.interest_name AS interest_name 
        //                     from userinterest
        //                     Join user On userinterest.user_id = user_id
        //                     Join interest On userinterest.interest_id = interest_id
        //                     where user_name like ? And interest_name like ?');
        // $sql->execute(['%'.$_POST['keyword'].'%']);
        // }else{
        //     sql=$pdo->prepare('select ')
        // }
    
    

//     foreach($sql as $row){
//     $id=$row['id'];
//     echo '<tr>';
//     echo '<td>', $id,'</td>';
//     echo '<td>';
//     echo '<a href="detail.php?id=',$id,'">', $row['name'],'</a>';
//     echo '</td>';
//     echo '<td>',$row['price'],'</td>';
//     echo '</tr>';
// }


try {
    // データベース接続を確立する
    $pdo = new PDO($connect,USER,PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 検索クエリを取得する
    $name_query = isset($_GET['name_query']) ? $_GET['name_query'] : '';
    $hobby_query = isset($_GET['hobby_query']) ? $_GET['hobby_query'] : '';

    // SQLクエリの準備
    $sql = "
        SELECT u.user_name, i.interest_name, p.user_profile_image_path
        FROM user u
        JOIN profile p ON u.user_id = p.user_id
        JOIN userinterest ui ON u.user_id = ui.user_id
        JOIN interest i ON ui.interest_id = i.interest_id
        WHERE u.user_name LIKE ? AND i.interest_name LIKE ?
    ";
    $stmt = $pdo->prepare($sql);
    $name_search_term = "%$name_query%";
    $hobby_search_term = "%$hobby_query%";
    $stmt->bindParam(1, $name_search_term, PDO::PARAM_STR);
    $stmt->bindParam(2, $hobby_search_term, PDO::PARAM_STR);

    // クエリを実行する
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 検索結果を表示する
    if ($results) {
        echo "<h2>Search Results:</h2>";
        foreach ($results as $row) {
            echo "<p>Name: " . htmlspecialchars($row["user_name"]) . "<br>";
            echo "Hobby: " . htmlspecialchars($row["interest_name"]) . "<br>";
            echo "<img src='" . htmlspecialchars($row["user_profile_image_path"]) . "' alt='Profile Image'><br></p><hr>";
        }
    } else {
        echo "No results found.";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>



    <!-- <div class="box">
        <img src="../image/虎.jpg" alt="">
        <div class="text">
                 <h3>虎虎　虎虎あいNO</h3>
        <p>狩り</p>
        <p>大食い</p>
        </div>
        </div>

        <div class="box">
            <img src="../image/虎.jpg" alt="">
            <div class="text">
                     <h3>虎虎　虎虎あいNO</h3>
            <p>狩り</p>
            <p>大食い</p>
            </div>
            </div>

            <div class="box">
                <img src="../image/虎.jpg" alt="">
                <div class="text">
                         <h3>虎虎　虎虎あいNO</h3>
                <p>狩り</p>
                <p>大食い</p>
                </div>
                </div> -->
    
<?php require 'G0-0footer.php'; ?>

    </body>
    </html>