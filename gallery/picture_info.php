<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./navbar/navbar4.css">
    <link rel="stylesheet" href="./css/picture_info3.css">
    <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&family=East+Sea+Dokdo&family=Gowun+Dodum&family=Handlee&family=Nanum+Brush+Script&family=Nanum+Gothic+Coding&family=Stylish&family=Sunflower&display=swap" rel="stylesheet">  <title>Document</title>
    <title>작품 설명</title>
</head>

<?php
header('Content-Type: charset=utf-8'); 
session_start(); 
$gallery_num = $_GET['gallery_num'];
$picture_num = $_GET['picture_num'];
$picture_src = "add.JPG";


$conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');

$sql = "SELECT * FROM users WHERE num = '$gallery_num' ";
$result = mysqli_query($conn, $sql);		
while($row = mysqli_fetch_array($result)){
    $user =  $row['u_id'];
}

$sql = "
    SELECT * FROM pictures WHERE 
    u_id = '{$user}' and picture_num = $picture_num ";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
    $picture_src =  $row['picture'];  
    $picture_title = $row['title'];
    $picture_content = $row['content'];
 }

$sql = "
    SELECT * FROM users WHERE 
    u_id = '{$user}'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
    $gallery_name =  $row['gallery_name'];  
 }

?>

<?php include "./navbar/navbar.php"?>

<body>
  <main>
    <h1 id="gallery_name"><?=$gallery_name;?></h1>
    <div id="pic_title-div">
      <img src="image/double-quotes_left.png" alt="img" width="70" height="70">
      <p><?=$picture_title?></p>
      <img src="image/double-quotes_right.png" alt="img" width="70" height="70">
    </div>
    <div id="picture-div">
      <img src="image/<?=$picture_src?>" alt="img" width="600" height="auto">
      <!-- <img src="image/frame.png" alt="img"> -->
    </div>

    <div id="content-div">
      <p>작품 설명</p>
      <textarea id="content" readonly><?php echo $picture_content; ?></textarea>
    </div>
  </main>
</body>
</html>