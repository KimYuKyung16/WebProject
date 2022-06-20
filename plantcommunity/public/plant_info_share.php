<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>식물 정보 공유</title>

    <link rel="stylesheet" href="css/main1.css">
    <link rel="stylesheet" href="css/c_plant_info_share4.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@900&family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e8028249b4.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php session_start() ?>
  <?php include "./main_title/title.php" ?> <!-- 메인타이틀, 네비게이션바 추가-->
  <main>
      <div class="content_list_div"> <!-- 게시판 div -->
        <div class="test">

          <div class="title">
              <h2>식물 정보 공유 게시판</h2>
              <input id="search" type="text">
              <input type="button" value="검색">
          </div>

          <table id="content_list"> <!-- 게시판 테이블 -->
            <thead> <!-- 게시판 메뉴 부분 -->
              <tr>
                <th class="num">번호</th>
                <th class="content_title">제목</th>
                <th class="writer">작성자</th>
                <th class="date">날짜</th>
                <th class="click_count">조회수</th>
              </tr>
            </thead>
            <tbody>  <!-- 게시판 글 리스트 부분 -->
              <?php 
              $what_php = "plant_info_share";  //paging.php에서 작업할 때 어떤 php에서 실행하는 건지 알려주기 위한 변수
              include "./paging/paging.php"; // 페이징 코드 추가

              while ($row = mysqli_fetch_array($result)) { 
                $sql2 = "SELECT * FROM users WHERE email = '{$row['email']}'";
                $result2 = mysqli_query($conn, $sql2);
                $profile_row = mysqli_fetch_array($result2);
              ?>
                <tr class="content_list">
                  <td class="num"><?=$row['num']?></td> <!-- 번호 -->
                  <td class="content_title"><a href ='read.php?num=<?=$row['num']?>'><?=$row['title']?></a></td> <!-- 제목 -->
                  <td id="writer"><image id="contents_profile" src="./profile/<?= $profile_row['profile']?$profile_row['profile']:'other.JPG' ?>"><?=$row['writer']?></td> <!-- 작성자 -->
                  <td class="date"><?=$row['date']?></td> <!-- 날짜 -->
                  <td class="click_count"><?=$row['click_count']?></td> <!-- 조회수 -->
                </tr>
              <?php  
              }; ?>
            </tbody>
          </table>

          <div class="pager">  <!-- 게시판 페이지 버튼 -->
            <?php include "./paging/plant_info_share_page.php"?>  <!-- 게시판 페이지 버튼 코드 추가 -->
          </div>

        </div>
      </div>

      <div class="button_div"> <!-- 글쓰기 버튼 -->
        <input id="write_button" type="button" value="글쓰기">        
      </div>

  </main>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <script type="module" src="./js/firebase.js"></script>
  <script type="module" src="./js/plant_info_share3.js"></script>

  <script type="text/javascript">
	  const email = "<?php echo $_SESSION['id'];?>";

  </script>

</body>
</html>