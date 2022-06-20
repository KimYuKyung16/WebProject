<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./navbar/navbar4.css">
  <link rel="stylesheet" href="photo_gallery_list1.css">
  <title>진행중인 사진전</title>
</head>

<body>
  <?php include "./navbar/navbar.php" ?>
  <!-- 네비게이션 바 부분 -->

  <?php
  session_start();
  header('Content-Type: charset=utf-8');

  $conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
  $sql = "
            SELECT * FROM users WHERE 
            u_id = '{$_SESSION['id']}' ";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_array($result)) {
    $gallery_num = $row['num'];
  }

  ?>

  <main>
    <aside>
      <ul>
        <li class="gallery-list"><a href="./gallery_introduce.php">갤러리 소개</a></li>
        <li class="gallery-list">진행중인 전시회</li>
          <ul id="s_gallery-list">
            <li class="s_gallery-list"><a id="gallery-list1" href="oriental_gallery_list.php">동양화 전시회</a></li>
            <li class="s_gallery-list"><a id="gallery-list2" href="western_gallery_list.php">서양화 전시회</a></li>
            <li class="s_gallery-list"><a id="gallery-list3" href="photo_gallery_list.php">사진 전시회</a></li>
          </ul>
        <li class="gallery-list"><a href="./read.php?num=<?=$gallery_num?>">내 갤러리</a></li>
      </ul>

    </aside>

    <?php
    $conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
    $sql = "SELECT * FROM users WHERE gallery_subject='photo' AND visable = 1 ORDER BY num DESC;";
    $result = mysqli_query($conn, $sql);
    ?>
    <div id="oriental_gallery_list">
      <h1>사진 전시회</h1>
      <ul>
        <?php
        while ($row = mysqli_fetch_array($result)) { ?>
          <li class="o_gallery-content">
            <image src="./thumbnail/<?= $row['thumbnail'] ?>" height=200 width=300></image>
            <div id="contents">
              <a href='read.php?num=<?= $row['num'] ?>'><?= $row['gallery_name'] ?></a>
              <p><?= $row['gallery_description'] ?></p>
            </div>
          </li>
          <hr noshade color="#E6E6E6">
        <?php
        } ?>

      </ul>
    </div>
  </main>

</body>

</html>