<?php
session_start(); 
header('Content-Type: charset=utf-8'); 

$conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');


$sql = "
    UPDATE users
    SET gallery_name = '{$_POST['gallery_name']}', exhibition_period = '{$_POST['date']}'
    WHERE u_id = '{$_SESSION['id']}' ";

$result = mysqli_query($conn, $sql);
if($result === false){
    echo "fail";
    echo mysqli_error($conn);
}else{
    echo "<script>location.replace('my_gallery.php');</script>"; 
}
?>

