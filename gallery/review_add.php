<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
session_start(); 
header('Content-Type: charset=utf-8'); 

$conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');

$review_nickname = $_POST['review_nickname'];
$review = $_POST['review'];
$gallery = $_POST['gallery'];
$num = $_POST['num'];

$sql = "INSERT INTO
        comment(gallery, nickname, review)
        VALUES('{$gallery}', '{$review_nickname}', '{$review}') ";

$result = mysqli_query($conn, $sql);

if($result === false){
    echo "fail";
    echo mysqli_error($conn);
}else{
    echo "<script>location.replace('read.php?num=$num');</script>"; 
}

?>
