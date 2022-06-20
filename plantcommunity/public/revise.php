<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/main1.css">
  <link rel="stylesheet" href="css/plant_info_share_write1.css">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@900&family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
  <title>로그인 페이지</title>
  <script src="https://kit.fontawesome.com/e8028249b4.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php include "./main_title/title.php" ?>
  <!-- 메인타이틀/네비게이션바 추가-->

  <?php
    session_start();
    header('Content-Type: charset=utf-8');
    $num = $_POST['num'];
  
    $conn = mysqli_connect('localhost', 'kyk', '3909', 'plant_db');
  
    $sql = "SELECT * FROM total_content_list WHERE num = '{$num}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
  ?>

  <main>
    <form action="revise_process.php" id="revise_form" method="POST">
      <!-- write.php로 글 정보 보내기-->
      <ul id="write_list">
        <li id="title-li1">  <!-- 글 제목 div-->
            <p>제목</p>
            <input name="title" id="title" type="text" value="<?=$row['title']?>">
        </li>
        <li id="board-li2"> <!-- 게시판 선택 div-->    
          <select class="board_select" name="board_select"> <!-- 저장할 게시판 선택하기-->
            <?php
              if ($row['board'] == 'plant_info_share') { ?>
                <option value='plant_info_share' selected>식물 정보 공유</option>
                <option value='plant_introduce'>내 식물 자랑</option>
            <?php
              } else { ?>
                <option value='plant_info_share'>식물 정보 공유</option>
                <option value='plant_introduce' selected>내 식물 자랑</option>
            <?php } ?>

          </select>
        </li>
        <li id="content-li3"> <!-- 글 내용 div-->
          <p>내용</p>
          <textarea name="content" id="content" style="resize: none;"><?=$row['content']?></textarea>
          <div>
            <input id="save_btn" type="button" value="저장">
            <input id="num" type="hidden" name="num" value=<?=$num?>> <!-- 사용자가 안보이게 게시글 번호값 보내기-->
          </div>
        </li>
      </ul>
    </form>
  </main>

  <script type="module" src="./js/firebase.js"></script>
  <script type="module" src="./js/revise.js"></script>

</body>

<script type="module" src="./js/firebase.js"></script>
</html>