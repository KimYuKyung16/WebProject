<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/main1.css">
  <link rel="stylesheet" href="./css/read.css">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@900&family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
  <title>Document</title>
  <script src="https://kit.fontawesome.com/e8028249b4.js" crossorigin="anonymous"></script>
</head>

<body>

  <?php include "./main_title/title.php" ?>

  <?php
  session_start();
  header('Content-Type: charset=utf-8');
  $num = $_GET['num'];

  $conn = mysqli_connect('localhost', 'kyk', '3909', 'plant_db');


  $sql = "SELECT * FROM total_content_list WHERE num = '{$num}'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  $click_count = $row['click_count'];
  $click_count++;

  $sql = "UPDATE total_content_list
        SET click_count = '{$click_count}'
        WHERE num = '{$num}' ";
  $result = mysqli_query($conn, $sql);
  ?>

  <main>
    <div id="board_title">
      <h2>
        <?php if ($row['board'] == "plant_info_share") {
          echo "식물정보공유게시판";
        } else {
          echo "내 식물자랑 게시판";
        } ?>
      </h2>
    </div>

    <ul id="write_list">
      <li id="title-li1">
        <!-- 글 제목 div-->
        <p>제목</p>
        <input name="title" id="title" type="text" value="<?= $row['title'] ?>" readonly>
      </li>
      <li id="board-li2">
        <ul id="user_info_list">
          <li>작성자:<?=$row['writer'] ?></li>
          <li>날짜/시간:<? echo $row['date'] . " " . $row['time']; ?></li>
          <li>조회수:<?=$row['click_count'] ?></li>
          <?php
            if ($row['email'] == $_SESSION['id']){ ?>
              <div id="action_div">
                <li><input id="revise_btn" type="button" value="수정"></li>
                <li><input id="delete_btn" type="button" value="삭제"></li>
              </div>
          <?php } ?>
          
        </ul>
      </li>
      <li id="content-li3">
        <!-- 글 내용 div-->
        <p>내용</p>
        <textarea name="content" id="content" style="resize: none;" readonly><?= $row['content']; ?></textarea>

        <form action="delete.php" id="delete_form" method="POST">
          <input type="hidden" name="num" value="<?= $num ?>">
        </form>

        <form action="revise.php" id="revise_form" method="POST">
          <input type="hidden" name="num" value="<?= $num ?>">
        </form>

      </li>
    </ul>

  </main>

</body>
<script src="./js/read2.js"></script>

</html>