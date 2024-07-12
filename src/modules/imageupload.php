<?php require "../modules/DBconnect.php"; ?>
<?php
$pdo = new PDO($connect,USER,PASS);

$target_dir = "../image/";
$target_file = $target_dir . basename($_FILES["filetoupload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["filetoupload"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    // echo "File is not an image.";
    $uploadOk = 0;
  }
}

if (file_exists($target_file)) {
    // echo "Sorry, file already exists.";
    $sql = $pdo->prepare("update profile SET user_profile_image_path = ? where user_id = ?");
    $sql->execute([basename($_FILES["filetoupload"]["name"]),$_POST['user_id']]);
    $uploadOk = 0;
}

if ($_FILES["filetoupload"]["size"] > 90000000) {
    // echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
    // echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file)) {
      // echo "The file ". htmlspecialchars( basename( $_FILES["filetoupload"]["name"])). " has been uploaded.";
      $sql = $pdo->prepare("update profile SET user_profile_image_path = ? where user_id = ?");
      $sql->execute([basename($_FILES["filetoupload"]["name"]),$_POST['user_id']]);
    } else {
      // echo "Sorry, there was an error uploading your file.";
    }
}
header('Location:../pages/G-4-1.php');
?>

<!-- <a href="../pages/G-4-1.php"><button>プロフィールに戻る</button></a> -->