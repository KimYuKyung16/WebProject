<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="./navbar.css"> -->
  <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nanum+Gothic+Coding&display=swap" rel="stylesheet">  
  <title>Document</title>

</head>

<?php
session_start();
header('Content-Type: charset=utf-8');

if (isset($_SESSION['id'])) { //로그인O
  $login_bool = 1; 
} else { //로그인X
  $login_bool = 0;
}

$conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
$sql = "
          SELECT * FROM users WHERE 
          u_id = '{$_SESSION['id']}' ";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
  $gallery_num = $row['num'];
}

?>

<body>
  <nav id="navbar"> <!--네비게이션바-->
    <ul id="navbar_menu">
      <li id="title">Gallery</li>

      <ul id="navbar_menu_list">
        <li><a href="../gallery/gallery_introduce.php">갤러리 소개</a></li>
        <li><a href="../gallery/oriental_gallery_list.php">진행중인 전시회</a></li>
        <li><a href="../gallery/read.php?num=<?=$gallery_num?>">내 갤러리</a></li>
      </ul>

      <ul id="my_info_list_logout" style="display:flex">
        <li><input id="signup_btn" type="button" value="회원가입"></li>
        <li><input id="login_btn" type="button" value="로그인"></li>
      </ul>
      <ul id="my_info_list_login" style="display:none">
        <li><input id="my_info_btn" type="button" value="내 정보"></li>
        <li><input id="logout_btn" type="button" value="로그아웃"></li>
      </ul>

    </ul>
  </nav>
</body>
<script>
const my_info_list_logout = document.getElementById("my_info_list_logout");
const my_info_list_login = document.getElementById("my_info_list_login");

var login_bool = <?php echo $login_bool;?>; 

if (login_bool == 1) { //로그인o
  my_info_list_logout.style.display = "none";
  my_info_list_login.style.display = "flex";
} else { //로그인x
  my_info_list_logout.style.display = "flex";
  my_info_list_login.style.display = "none";
}

</script>
<script type="module" src="./navbar/navbar.js"></script>
</html>