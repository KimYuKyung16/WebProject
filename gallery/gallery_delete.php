<?php 
  header('Content-Type: charset=utf-8');
  $num = $_GET['num'];
  $u_id = $_GET['u_id'];

  $conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
  $sql = "
  DELETE FROM users
  WHERE num = $num";


  $result = mysqli_query($conn, $sql);

  if($result === false){
    echo "fail";
    echo mysqli_error($conn);
  }else{
    echo "<script>location.replace('manage.php');</script>"; 
}
?>