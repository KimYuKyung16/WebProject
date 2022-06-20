<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./navbar/navbar4.css">
  <link rel="stylesheet" href="oriental_gallery_list2.css">
  <link rel="stylesheet" href="./css/gallery_introduce.css">
  <title>갤러리 소개</title>
</head>

<body>
  <?php include "./navbar/navbar.php" ?>
  <!-- 네비게이션 바 부분 -->

  <!-- <?php
    header('Content-Type: charset=utf-8');
    $conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
    $sql = "
      SELECT * FROM users WHERE 
      u_id = '{$_SESSION['id']}' ";
    $result = mysqli_query($conn, $sql);
  
    while ($row = mysqli_fetch_array($result)) {
      $thumbnail =  $row['thumbnail'];
    }
  
  ?> -->

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

    <div id="gallery_introduce_list">
      <ul>
        <li>
          <video class="introduece_video" src="./image/gallery_video.mp4" controls autoplay loop width=100% heigth=auto></video>
          <p>메타버스로도 관람이 가능한 갤러리입니다.</p>
        </li>
        <!-- <li>갤러리 만든 사람</li>
        <li id="gallery_indtroduce_list2">
          <p>갤러리를 만든 사람입니다.</p>
        </li> -->
        <li>
          <img class="introduce_image" src="./image/introduce1.JPG" width=80% heigth=auto>
          <p id="introduce_list1" style="display:none">① 본인이 직접 갤러리를 만들고 작품을 추가할 수 있습니다.</p>
        </li>
        <li>
          <img class="introduce_image" src="./image/introduce2.JPG" width=80% heigth=auto>
          <p id="introduce_list2" style="display:none">② 본인의 갤러리에 다른 사람들이 후기를 작성할 수 있습니다.</p>
        </li>
        <li>
          <img class="introduce_image"  src="./image/introduce3.JPG" width=80% heigth=auto>
          <p id="introduce_list3" style="display:none">③ 추가한 작품은 위와 같은 방식으로 보여집니다.</p>
          <p id="introduce_list3" style="display:none">상세 설명은 작품을 클릭하면 확인할 수 있습니다.</p>
        </li>
        <li>
          <img class="introduce_image"  src="./image/introduce4.JPG" width=80% heigth=auto>
           <p id="introduce_list4" style="display:none">④ 다양한 사람들이 만든 갤러리들을 구경할 수 있습니다.</p>
        </li>
      </ul>
    </div>
  </main>

  <script src="./js/gallery_introduce3.js"></script>
</body>

</html>