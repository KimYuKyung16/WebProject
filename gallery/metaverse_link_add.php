<?php
header('Content-Type: charset=utf-8');

$user = $_POST['user'];
$link = $_POST['link'];
$metaverse_complete = $_POST['metaverse_complete'];

$conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
$sql = "
    UPDATE users
    SET metaverse_link = '{$_POST['link']}', metaverse_complete = '{$_POST['metaverse_complete']}'
    WHERE u_id = '{$_POST['user']}' ";

$result = mysqli_query($conn, $sql);

if($result === false){
  echo "fail";
  echo mysqli_error($conn);
}else{
  echo "success" ;
  header("location: manage.php");
}

?>