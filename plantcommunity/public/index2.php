<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/board3.css">
    <link rel="stylesheet" href="./css/main2.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@900&family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
    <title>메인화면</title>
    <script src="https://kit.fontawesome.com/e8028249b4.js" crossorigin="anonymous"></script>
</head>

<?php
session_start();

if (isset($_SESSION['id'])) { //로그인O
  $login_bool = 1; 
} else { //로그인X
  $login_bool = 0;
}
?>

<body>
  <?php 
  // session_start(); 
  echo '<script>';
  echo 'console.log("'.$_SESSION['id'].'")';
  echo '</script>';
  ?>

  <?php include "./main_title/title.php"?>
      
  <main>
    <div id="side_menu">  
      <div id="side_menu1" class="side_menu" style="display:block">
        <ul class="main_login">
          <li><h2 class="login_title">로그인</h2></li>
          <li><button id="login_btn"><img src="./image/google_icon.png" width=45 height=45>Google 로그인</button></li>
        </ul>
      </div> 
      <div id="side_menu2" class="side_menu"  style="display:none">
        <ul class="main_login">
          <?php
            $conn = mysqli_connect('localhost', 'kyk', '3909', 'plant_db');
            $sql = "SELECT * FROM users WHERE email = '{$_SESSION['id']}' ";
            $result = mysqli_query($conn, $sql);                
            while ($row = mysqli_fetch_array($result)) {
              $nickname = $row['nickname'];
              $profile = $row['profile'];
            } 
          ?>
          <li>
            <div>
              <image id="my_profile" src="./profile/<?=$profile?$profile:'other.JPG'?>">
              <ul>
                <li><?=$nickname?></li>
                <li><?=$_SESSION['id']?></li>
              </ul>          
            </div>
          </li>
          <li id="write_btn"><input type="button" value="글쓰기"></li>
          <li><input id="logout_btn" type="button" value="로그아웃"></li>
        </ul>
      </div> 
    </div>

    <div id="main_div">
      <!-- <img id="product_image" src="./image/banner.png?ver=1">   -->
      <div class="content_list_div">
        <div class="test">
          <div class="title">
            <h2>전체글</h2>
          </div>
          <table id="content_list">
            <thead>
              <tr>
                <th class="num">번호</th>
                <th class="content_title">제목</th>
                <th class="writer">작성자</th>
                <th class="date">날짜</th>
                <th class="click_count">조회수</th>
              </tr>
            </thead>
            <tbody>
              <?php $what_php = "index" ?>
              <?php include "./paging/paging.php"?>
            
              <?php
              while ($row = mysqli_fetch_array($result)) {
              ?>
                <?php
                $sql2 = "SELECT * FROM users WHERE email = '{$row['email']}' ";
                $result2 = mysqli_query($conn, $sql2);
                $profile_row = mysqli_fetch_array($result2)
                ?>
                <tr class="content_list">
                <td class="num"><?=$row['num']?></td>
                <td class="content_title"><a href ='read.php?num=<?=$row['num']?>'><?=$row['title']?></a></td>
                <td class="writer"><image id="contents_profile" src="./profile/<?= $profile_row['profile']?$profile_row['profile']:'other.JPG'?>"><?=$row['writer']?></td>
                <td class="date"><?=$row['date']?></td>
                <td class="click_count"><?=$row['click_count']?></td>
                </tr>
                <?php  
              }; ?>
            </tbody>
          </table>
    
          <div class="pager">
            <?php include "./paging/index_page.php"?>            
          </div>

        </div>
      </div>
    </div>
  </main>

  <footer class="copyright">
    <p>제작: Ireum</p>
  </footer>
    
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="module" src="./js/firebase1.js"></script>
  <script type="module" src="./js/index5.js"></script>


  <script>
    const side_menu1 = document.getElementById("side_menu1");
    const side_menu2 = document.getElementById("side_menu2");

    var login_bool = <?php echo $login_bool;?>; 

    if (login_bool == 1) { //로그인o
      side_menu1.style.display = "none";
      side_menu2.style.display = "flex";
    } else { //로그인x
      side_menu1.style.display = "flex";
      side_menu2.style.display = "none";
    }
</script>

</body>




</html> 