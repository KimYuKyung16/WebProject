<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title></title>
</head>
<body>

<?php
session_start(); 
header('Content-Type: charset=utf-8'); 

$gallery_name = $_POST['gallery_name'];
$gallery_subject = $_POST['gallery_subject'];
$gallery_description = $_POST['gallery_description'];
$gallery_visable = $_POST['gallery_visable'];
$metaverse = $_POST['gallery_metaverse'];
$exhibition_period = $_POST['exhibition_period'];


$conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');

$profileImage = $dirName.$_FILES['a_file']['name'];


$uploaddir = './thumbnail/';
$name = "hello.jpg";
$name1 = date('Y_m_d_his', time()).".JPG";

if (move_uploaded_file($_FILES['a_file']['tmp_name'],$uploaddir.$name1)) {
    // echo 'sucess';
    $sql = "
        UPDATE users SET
        thumbnail = '{$name1}'
        WHERE u_id = '{$_SESSION['id']}'
        ";
    $result = mysqli_query($conn, $sql);
    header("location: my_gallery.php");
}
else{
    // echo 'fail';
}

?>

<!-- 제목, 내용 넘겼을 때 -->
<?php

if ($gallery_name != null && $gallery_subject != null && $gallery_description != null && $exhibition_period != null) {
  // echo 'sucess';

  // echo "값 있다";
  $sql = "
      UPDATE users SET
      gallery_name = '{$gallery_name}', gallery_description = '{$gallery_description}',
      visable = '{$gallery_visable}', metaverse = '{$metaverse}',
      exhibition_period = '{$exhibition_period}',
      gallery_subject = '{$gallery_subject}'
      WHERE u_id = '{$_SESSION['id']}'
      ";
  $result = mysqli_query($conn, $sql);
  header("location: my_gallery.php");
}
else{
  // echo 'fail';
}

?>

 

</body>

