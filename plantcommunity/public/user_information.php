<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/user_information2.css">
    <link rel="stylesheet" href="./css/main4.css">
    <!-- <link rel="stylesheet" href="./css/board2.css"> -->

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@900&family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
    <title>유저 정보 입력 페이지</title>
    <script src="https://kit.fontawesome.com/e8028249b4.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php include "./main_title/title.php" ?>
  <?php
  session_start();
  $email = $_SESSION['id'];
  $conn = mysqli_connect('localhost', 'kyk', '3909', 'plant_db');
  $sql = "SELECT * FROM users WHERE email = '{$email}' ";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_array($result);
  ?>
  <h1>현재 유저 정보</h1> 
  <div id="total_div"> 
  <div id="user_div">
    <table>
      <tr>
        <td>유저의 프로필 사진: </td>
        <td><image id="profile" src="./profile/<?=$row['profile']?$row['profile']:"other.JPG"?>"></td>
      </tr>
      <tr>
        <td>유저의 닉네임: <?=$row['nickname']?></td>
      </tr>
      <tr>
        <!-- <form action="user_information_edit.php" id="my_info_revise_form" method="POST">
          <input id="email" name="email" type="hidden" value="<?=$email?>"> -->
          <td><input id="info_revise_btn" type="button" value="내 정보 수정하기"></td>
        <!-- </form>  -->
      </tr>
    </table>
  </div>

  <div id="main_div">
    <p class="tmp_title">유저가 쓴 글</p>
        <div class="content_list_div">
          <div class="test">
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
                <?php $what_php = "user_information" ?>
                <?php include "./paging/paging.php"?>
              
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <?php
                  $sql2 = "SELECT * FROM users WHERE email = '{$email}' ";
                  $result2 = mysqli_query($conn, $sql2);
                  $profile_row = mysqli_fetch_array($result2);
                  ?>
                  <tr class="content_list">
                  <td class="num"><?=$row['num']?></td>
                  <td class="content_title"><a href ='read.php?num=<?=$row['num']?>'><?=$row['title']?></a></td>
                  <td class="writer"><image id="contents_profile" src="./profile/<?= $profile_row['profile']?$profile_row['profile']:'other.JPG'?>"><?=$row['writer']?></td>
                  <td class="date"><?=$row['date']?></td>
                  <td class="click_count"><?=$row['click_count']?></td>
                  </tr>
                  <?php  
                  /* paging */
                  $cnt++;
                }; ?>
              </tbody>
            </table>
      

              <div class="pager">
                <?php include "./paging/user_information_page.php"?>            
              </div>
            </div>
          </div>
        </div>
  </div>
  
  <script type="module" src="./js/firebase.js"></script>
  <script type="module" src="./js/user_information3.js"></script>
</body>
</html>