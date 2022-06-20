<?php 
  include 'inc_head.php';
?>
<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>
    <?php
      if ( $jb_login ) {
        echo '<h1>이미 로그인하셨습니다.</h1>';
      } else {
        $username = $_POST[ 'username' ];
        $password = $_POST[ 'password' ];
        if ( $username == 'qwe' and $password == '123' ) {
          $_SESSION[ 'username' ] = $username;
          echo '<h1>Hi!</h1>';
        } else {
          echo '<p>사용자 이름 또는 비밀번호가 틀렸습니다.</p>';
        }
      }
    ?>
  </body>
</html>