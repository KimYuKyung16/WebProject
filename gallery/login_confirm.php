<?php
header('Content-Type: charset=utf-8'); 
session_start(); 


$id = $_SESSION['id'];

$conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
$sql = "SELECT * FROM users WHERE u_id = '$id' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if(!isset($id)) {
    echo "<script>location.replace('login.php');</script>";        
}
else{
    if($row['gallery_name'] != ''){
        echo "<script>location.replace('my_gallery.php');</script>"; 
    } elseif($_SESSION['id'] == "manage") {
        echo "<script>location.replace('manage.php');</script>";
    } else{ //갤러리 없을 때
        echo "<script>location.replace('gallery_add.php');</script>"; 
    }      
    
}

?>