<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/manage3.css">
  <link rel="stylesheet" href="./navbar/navbar4.css">
  <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nanum+Gothic+Coding&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&family=East+Sea+Dokdo&family=Gowun+Dodum&family=Handlee&family=Nanum+Brush+Script&family=Nanum+Gothic+Coding&family=Stylish&family=Sunflower&display=swap" rel="stylesheet">
  <title>Document</title>
</head>

<body>
  <?php include "./navbar/navbar.php" ?>
  <!-- 네비게이션 바 부분 -->

  <main>
    <?php
    $timenow = date("Y-m-d"); #오늘 날짜
    $str_now = strtotime($timenow);
    ?>

    <div id="user_list">
      <h2>유저 명단</h2>
      <table id="user_list_table">
        <tr class="table_head">
          <td>사용자</td>
          <td>갤러리 이름</td>
          <td>전시 기간</td>
          <td>삭제</td>
        </tr>

        <?php

        $conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
        $sql = "SELECT * FROM users WHERE u_id not in('manage') ORDER BY exhibition_period asc";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
        ?>
          <tr>
            <td id="user_id"><?= $row['u_id'] ?></td>
            <td id="gallery_name"><?= $row['gallery_name'] ?></td>
            <td id="exhibition_period"><?= $row['exhibition_period'] ?></td>
            <td id="btn">
              <?php
              $str_target = strtotime($row['exhibition_period']); # 비교할 날짜
              $timetarget = strtotime($str_target);
              if ($str_now == $str_target) { ?>
                <a href='gallery_delete.php?num=<?= $row['num'] ?>'><input id="delete_btn" type="button" value="삭제"></a>
                <?php echo "<script>alert('삭제할 갤러리가 있습니다.');</script>"; ?>
              <?php
              } elseif ($str_now > $str_target) { ?>
                <a href='gallery_delete.php?num=<?= $row['num'] ?>&u_id=<?= $row['u_id'] ?>'><input id="delete_btn" type="button" value="삭제"></a>
              <?php
              } ?>
            </td>
          </tr>
        <?php
        }
        ?>
      </table>
    </div>

    <div id="metaverse_list">
      <h2>메타버스 제작이 필요한 유저</h2>
      <table id="metaverse_list_table">
        <tr class="table_head">
          <td>사용자</td>
          <td>갤러리 이름</td>
          <td>메타버스 제작 여부</td>
          <td>전시 기간</td>
        </tr>
        <?php //메타버스 제작이 필요한 유저들 출력
        $sql = "SELECT * FROM users WHERE metaverse = 1 and metaverse_complete = 0";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
        ?>
          <tr>
            <td><?= $row['u_id'] ?></td>
            <td><?= $row['gallery_name'] ?></td>
            <td id="metaverse"><?php if ($row['metaverse'] == 1) { echo "제작"; } ?></td>
            <td><?= $row['exhibition_period'] ?></td>
          </tr>
        <?php
        }
        ?>
      </table>

      <div id="metaverse_link"> <!-- 유저들에게 메타버스 링크 전달 -->
        <table id="metaverse_link_table">
          <tr class="table_head1">
            <td class="metaverse_list1">유저</td>
            <td colspan="2" class="metaverse_list2">메타버스 링크</td>
          </tr>
          <tr class="table_body">
            <form action="metaverse_link_add.php" id="revise_gallery_form" method="POST">
              <td class="table_body1"><input id="user" name="user" type="text" placeholder="유저 아이디"></td>
              <td class="table_body2">
                <input id="link" name="link" type="text" placeholder="메타버스 링크">
                <input id="submit_btn" type="submit" value="전송">
              </td>
              <input name="metaverse_complete" type="hidden" value=1>
            </form>
          </tr>
        </table>
      </div>


    </div>
  </main>






</body>