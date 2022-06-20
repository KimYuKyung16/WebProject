<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="css/main2.css"> -->
  <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&family=East+Sea+Dokdo&family=Gowun+Dodum&family=Handlee&family=Nanum+Brush+Script&family=Nanum+Gothic+Coding&family=Stylish&family=Sunflower&display=swap" rel="stylesheet">  <title>Document</title>
  <link rel="stylesheet" href="./navbar/navbar4.css">
  <link rel="stylesheet" href="./banner_practice/banner2.css">
  <link rel="stylesheet" href="./banner_practice/right_div6.css">
  <link rel="stylesheet" href="./test/test2.css">
  <link rel="stylesheet" href="./css/gallery_list3.css">
  <link rel="stylesheet" href="./css/footer.css">
  <title>Document</title>
</head>

<body>
  <?php include "./navbar/navbar.php" ?>
  <!-- 네비게이션 바 부분 -->

  <main class="main_div">
    <div>
      <img id="main_frame" src="./image/frame2.png" width="850" height="550">
      <div id="thumbnail-div">
        <ul id="thumbnail_list">
          <li>
            <image id="img1" class="img" src="./thumbnail/<?= $thumbnail1 ? $thumbnail1 : "test1" ?>.jpg"> </image>
          </li>
          <li>
            <image id="img2" class="img" src="./thumbnail/<?= $thumbnail2 ? $thumbnail2 : "test1" ?>.jpg"></image>
          </li>
          <li>
            <image id="img3" class="img" src="./thumbnail/<?= $thumbnail3 ? $thumbnail3 : "test1" ?>.jpg"></image>
          </li>
        </ul>
      </div>
    </div>


    <div id="popular_gallery_list_div">
      <?php
      $conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
      $sql = "SELECT * FROM users WHERE visable = 1 ORDER BY click_count DESC limit 3;";
      $result = mysqli_query($conn, $sql);

      $count = 0;
      ?>
      <h2 id="popular_gallery">인기 갤러리</h2>
      <table class="popular_gallery_list-table">
        <?php
        while ($row = mysqli_fetch_array($result)) {
          if ($count == 0) { ?>
            <tr class="brd">
              <td class="popular_gallery_list" id="p_gallery_list-td1">
                <image class="p_galllery_list_icon" src="./image/crown.png" height=30 width=30></image>
                <a id="popular_gallery_list_1" href='read.php?num=<?= $row['num'] ?>'><?= $row['gallery_name'] ?></a>
              </td>
            </tr>
          <?php
            $thumbnail1 = $row['thumbnail'];
          } elseif ($count == 1) { ?>
            <tr class="brd">
              <td class="popular_gallery_list" id="p_gallery_list-td2">
                <image class="p_galllery_list_icon" src="./image/crown.png" height=30 width=30></image>
                <a id="popular_gallery_list_2" href='read.php?num=<?= $row['num'] ?>'><?= $row['gallery_name'] ?></a>
              </td>
            </tr>
          <?php
            $thumbnail2 = $row['thumbnail'];
          } elseif ($count == 2) { ?>
            <tr class="brd">
              <td class="popular_gallery_list" id="p_gallery_list-td3">
                <image class="p_galllery_list_icon" src="./image/crown.png" height=30 width=30></image>
                <a id="popular_gallery_list_3" href='read.php?num=<?= $row['num'] ?>'><?= $row['gallery_name'] ?></a>
              </td>
            </tr>
          <?php
            $thumbnail3 = $row['thumbnail'];
          } ?>
        <?php
          $count++;
        }
        mysqli_close($conn);
        ?>
      </table>
    </div>

  </main>




  <div id="oriental_gallery_list_div">
    <div id="oriental_gallery_list_div1">
      <?php
      $conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
      $sql = "SELECT * FROM users WHERE gallery_subject='oriental' AND visable = 1 ORDER BY click_count DESC limit 4;";
      $result = mysqli_query($conn, $sql);

      $count1 = 0;
      ?>
      <h2 id="oriental_title">동양화 갤러리</h2>
      <p class="title_desc">동양화만의 매력이 있는</p>
      <ul class="oriental_gallery_list-table">
        <?php
        while ($row = mysqli_fetch_array($result)) {
          if ($count1 == 0) { ?>
            <li class="oriental_gallery_list" id="p_gallery_list-td1">
              <a id="oriental_gallery_list_1" href='read.php?num=<?= $row['num'] ?>'>
                <image id="o_img1" class="o_galllery_list_img" src="./thumbnail/<?= $row['thumbnail'] ?>" height=250 width=250></image>
              </a>
            </li>
          <?php
            // $thumbnail1 = $row['thumbnail'];
          } elseif ($count1 == 1) { ?>
            <li class="oriental_gallery_list" id="p_gallery_list-td2">
              <a id="oriental_gallery_list_2" href='read.php?num=<?= $row['num'] ?>'>
                <image id="o_img2" class="o_galllery_list_img" src="./thumbnail/<?= $row['thumbnail'] ?>" height=250 width=250></image>
              </a>
            </li>
          <?php
            // $thumbnail2 = $row['thumbnail'];
          } elseif ($count1 == 2) { ?>
            <li class="oriental_gallery_list" id="p_gallery_list-td3">
              <a id="oriental_gallery_list_3" href='read.php?num=<?= $row['num'] ?>'>
                <image id="o_img3" class="o_galllery_list_img" src="./thumbnail/<?= $row['thumbnail'] ?>" height=250 width=250></image>
              </a>
            </li>
          <?php
            // $thumbnail3 = $row['thumbnail'];
          } elseif ($count1 == 3) { ?>
            <li class="oriental_gallery_list" id="p_gallery_list-td4">
              <a id="oriental_gallery_list_4" href='read.php?num=<?= $row['num'] ?>'>
                <image id="o_img4" class="o_galllery_list_img" src="./thumbnail/<?= $row['thumbnail'] ?>" height=250 width=250></image>
              </a>
            </li>
          <?php
            // $thumbnail3 = $row['thumbnail'];
          } ?>
        <?php
          $count1++;
        }
        mysqli_close($conn);
        ?>
      </ul>
    </div>

    <div id="oriental_gallery_list_div2">
      <a href="./oriental_gallery_list.php"><img id="arrow" src="./image/arrow_right.png" width=50 height=50>전체보기</a>
    </div>

    <!-- <input type="button" value="전체보기"> -->
  </div>







  <div id="western_gallery_list_div">
    <div id="western_gallery_list_div1">
      <?php
      $conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
      $sql = "SELECT * FROM users WHERE gallery_subject='western' AND visable = 1 ORDER BY click_count DESC limit 4;";
      $result = mysqli_query($conn, $sql);

      $count1 = 0;
      ?>
      <ul class="western_gallery_list-table">
        <?php
        while ($row = mysqli_fetch_array($result)) {
          if ($count1 == 0) { ?>
            <li class="western_gallery_list" id="p_gallery_list-td1">
              <a id="westernl_gallery_list_1" href='read.php?num=<?= $row['num'] ?>'>
                <image id="w_img1" class="w_galllery_list_img" src="./thumbnail/<?= $row['thumbnail'] ?>" height=300 width=300></image>
              </a>
            </li>
          <?php
            // $thumbnail1 = $row['thumbnail'];
          } elseif ($count1 == 1) { ?>
            <li class="western_gallery_list" id="p_gallery_list-td2">
              <a id="western_gallery_list_2" href='read.php?num=<?= $row['num'] ?>'>
                <image id="w_img2" class="w_galllery_list_img" src="./thumbnail/<?= $row['thumbnail'] ?>" height=300 width=300></image>
              </a>
            </li>
          <?php
            // $thumbnail2 = $row['thumbnail'];
          } elseif ($count1 == 2) { ?>
            <li class="western_gallery_list" id="p_gallery_list-td3">
              <a id="western_gallery_list_3" href='read.php?num=<?= $row['num'] ?>'>
                <image id="w_img3" class="w_galllery_list_img" src="./thumbnail/<?= $row['thumbnail'] ?>" height=300 width=300></image>
              </a>
            </li>
          <?php
            // $thumbnail3 = $row['thumbnail'];
          } elseif ($count1 == 3) { ?>
            <li class="western_gallery_list" id="p_gallery_list-td4">
              <a id="western_gallery_list_4" href='read.php?num=<?= $row['num'] ?>'>
                <image id="w_img4" class="w_galllery_list_img" src="./thumbnail/<?= $row['thumbnail'] ?>" height=300 width=300></image>
              </a>
            </li>
          <?php
            // $thumbnail3 = $row['thumbnail'];
          } ?>
        <?php
          $count1++;
        }
        mysqli_close($conn);
        ?>
      </ul>
      <p id="w_title_dec" class="title_desc">서양화만의 매력이 있는</p>
      <h2 id="western_title">서양화 갤러리</h2>
    </div>
    <div id="western_gallery_list_div2">
      <a href="./western_gallery_list.php"><img id="arrow" src="./image/arrow_right.png" width=50 height=50>전체보기</a>
    </div>

  </div>






  <div id="photo_gallery_list_div">
    <div id="photo_gallery_list_div1">
      <?php
      $conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
      $sql = "SELECT * FROM users WHERE gallery_subject='photo' AND visable = 1 ORDER BY click_count DESC limit 4;";
      $result = mysqli_query($conn, $sql);

      $count1 = 0;
      ?>
      <h2 id="photo_title">사진전 갤러리</h2>
      <p id="p_title_dec" class="title_desc">사진전만의 매력이 있는</p>
      <ul class="photo_gallery_list-table">
        <?php
        while ($row = mysqli_fetch_array($result)) {
          if ($count1 == 0) { ?>
            <li class="photo_gallery_list" id="p_gallery_list-td1">
              <a id="photol_gallery_list_1" href='read.php?num=<?= $row['num'] ?>'>
                <image id="p_img1" class="p_galllery_list_img" src="./thumbnail/<?= $row['thumbnail'] ?>" height=300 width=300></image>
              </a>
            </li>
          <?php
            // $thumbnail1 = $row['thumbnail'];
          } elseif ($count1 == 1) { ?>
            <li class="photo_gallery_list" id="p_gallery_list-td2">
              <a id="photo_gallery_list_2" href='read.php?num=<?= $row['num'] ?>'>
                <image id="p_img2" class="p_galllery_list_img" src="./thumbnail/<?= $row['thumbnail'] ?>" height=300 width=300></image>
              </a>
            </li>
          <?php
            // $thumbnail2 = $row['thumbnail'];
          } elseif ($count1 == 2) { ?>
            <li class="photo_gallery_list" id="p_gallery_list-td3">
              <a id="photo_gallery_list_3" href='read.php?num=<?= $row['num'] ?>'>
                <image id="p_img3" class="p_galllery_list_img" src="./thumbnail/<?= $row['thumbnail'] ?>" height=300 width=300></image>
              </a>
            </li>
          <?php
            // $thumbnail3 = $row['thumbnail'];
          } elseif ($count1 == 3) { ?>
            <li class="photo_gallery_list" id="p_gallery_list-td4">
              <a id="photo_gallery_list_4" href='read.php?num=<?= $row['num'] ?>'>
                <image id="p_img4" class="p_galllery_list_img" src="./thumbnail/<?= $row['thumbnail'] ?>" height=300 width=300></image>
              </a>
            </li>
          <?php
            // $thumbnail3 = $row['thumbnail'];
          } ?>
        <?php
          $count1++;
        }
        mysqli_close($conn);
        ?>
      </ul>
    </div>
    <div id="photo_gallery_list_div2">
      <a href="./photo_gallery_list.php"><img id="arrow" src="./image/arrow_right.png" width=50 height=50>전체보기</a>
    </div>

  </div>


  <footer>
    <div>
    <p>제작: 김유경, 편진범</p>
    <p>문의 이메일: kyg0954@naver.com</p>
    </div>
  </footer>









  <!-- <script type="module" src="./js/main2.js"></script> -->
</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<!-- <script type="module" src="./banner_practice/banner2.js"></script> -->
<script type="text/javascript" src="./test/test3.js"></script>
<script type="text/javascript" src="./js/gallery_list.js"></script>

<script type="text/javascript">
  const thumbnail1 = document.getElementById("img1");
  const thumbnail2 = document.getElementById("img2");
  const thumbnail3 = document.getElementById("img3");

  var name_1 = "<?php echo $thumbnail1; ?>";
  var name_2 = "<?php echo $thumbnail2; ?>";
  var name_3 = "<?php echo $thumbnail3; ?>";

  thumbnail1.src = "./thumbnail/" + name_1;
  thumbnail2.src = "./thumbnail/" + name_2;
  thumbnail3.src = "./thumbnail/" + name_3;
</script>

</html>