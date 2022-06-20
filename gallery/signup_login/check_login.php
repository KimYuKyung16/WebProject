<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title></title>
</head>
<body>

<?php 
session_start(); 

   $host = 'localhost';
   $user = 'kyk';
   $pw = '3909';
   $db_name = 'gallery_db';
      $mysqli = new mysqli($host, $user, $pw, $db_name); //db 연결
      //$conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');

      //login.php에서 입력받은 id, password
      $username = $_POST['id'];
      $userpass = $_POST['pw'];
      
      $q = "SELECT * FROM users WHERE u_id = '$username' AND u_pw = '$userpass'";
      $result = $mysqli->query( $q);
      $row = $result->fetch_array(MYSQLI_ASSOC);

     



      //결과가 존재하면 세션 생성
      if ($row != null) {
         $_SESSION['id'] = $row['u_id'];
         $_SESSION['pw'] = $row['u_pw'];
         echo "<script>location.href='../main.php'</script>";
         exit;
      }
      
      //결과가 존재하지 않으면 로그인 실패
      if($row == null){
         echo "<script>alert('Invalid username or password')</script>";
         echo "<script>location.replace('login.php');</script>";
         exit;
      }
      ?>
   </body>