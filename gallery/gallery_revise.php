<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="picture_desc2.css"> -->
  <link rel="stylesheet" href="./css/gallery_revise3.css">
  <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&family=East+Sea+Dokdo&family=Gowun+Dodum&family=Handlee&family=Nanum+Brush+Script&family=Nanum+Gothic+Coding&family=Stylish&family=Sunflower&display=swap" rel="stylesheet">
  <title>Document</title>
</head>

<body>
  <!-- 타이틀 -->
  <header id="title_div">
    <h1 id="title">Gallery</h1>
  </header>

  <?php
  session_start();
  $picture_num = $_GET['picture_num'];
  $picture_src = "add.JPG";

  // echo $picture_num;

  header('Content-Type: charset=utf-8');
  $conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
  $sql = "
    SELECT * FROM users WHERE 
    u_id = '{$_SESSION['id']}' ";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_array($result)) {
    $thumbnail =  $row['thumbnail'];
    $gallery_name =  $row['gallery_name'];
    $gallery_subject = $row['gallery_subject'];
    $gallery_description = $row['gallery_description'];
    $gallery_visable = $row['visable'];
    $metaverse = $row['metaverse'];
    $exhibition_period = $row['exhibition_period'];
  }

  if ($thumbnail != null) {
    $picture_src = $thumbnail;
  }

  ?>

  <main>
    <h1 class="modal-title">갤러리 수정하기</h5>
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="gallery_revise_process.php" id="save_img_form" method="POST" enctype="multipart/form-data">
          <div class="modal-body text-center">
            <button type="button" class="close close_modal" id="close_modal_btn2" style="display: none;">
              <span aria-hidden="true">&times;</span>
            </button>
            <img id="backImg" src="./thumbnail/<?= $picture_src ?>" alt="profile" width="600" height=auto>
            <div class="back">
              <img id="frontImg" src="./image/thumbnail_add_btn.png" alt="profile" width="180" height="40">
              <input class="inputfile" accept=".jpg, .jpeg, .png" style="display: none;" type="file" value="1" name="a_file">
              <button type="button" class="save_btn" id="modal_okay_btn">저장</button>
              <!-- 사진 저장하는 버튼 -->
            </div>
          </div>
        </form>
      </div>

      <hr>

      <div id="pic_info-div">
        <form action="gallery_revise_process.php" id="revise_gallery_form" method="POST">
          <!-- <div> -->
          <div id="gallery_name_div" class="info">
            <p>갤러리 이름</p>
            <input id="gallery_name" type="text" name="gallery_name" value="<?= $gallery_name ?>">
          </div>
          <div id="gallery_subject_div" class="info">
            <p>갤러리 종류</p>
            <select class="subject_select" name="gallery_subject">
              <!-- 저장할 게시판 선택하기-->
              <option value='oriental' <?php if ($gallery_subject == 'oriental') { ?>selected<? } ?>>동양화</option>
              <option value='western' <?php if ($gallery_subject == 'western') { ?>selected<? } ?>>서양화</option>
              <option value='photo' <?php if ($gallery_subject == 'photo') { ?>selected<? } ?>>사진전</option>
            </select>
          </div>
          <div id="gallery_description_div" class="info">
            <p>갤러리 설명</p>
            <textarea id="gallery_description" name="gallery_description" required><?= $gallery_description ?></textarea>
          </div>
          <div id="gallery_visable_div" class="info">
            <label for="gallery_visable">갤러리 공개 여부 </label>
            <input id="gallery_visable" type="checkbox" name="gallery_visable" value='1' <?php if ($gallery_visable == 1) { ?>checked<? } ?>>
          </div>
          <div id="gallery_metaverse_div" class="info">
            <label for="gallery_metaverse">갤러리 메타버스 제작 여부 </label>
            <input id="gallery_metaverse" type="checkbox" name="gallery_metaverse" value='1' <?php if ($metaverse == 1) { ?>checked<? } ?>>
          </div>
          <div id="gallery_exhibition_period" class="info">
            <label for="exhibition_period">갤러리 전시 기간 </label>
            <input id="exhibition_period" type="date" name="exhibition_period" value=<?= $exhibition_period ?>>
          </div>
          <div id="btn-div" class="info">
            <button type="submit" class="save_btn" id="save_btn">저장</button>
          </div>
          <!-- 갤러리 설정 저장하는 버튼 -->
          <!-- </div> -->
        </form>
        <!-- </div> -->
      </div>
    </div>
  </main>



  <!--js파일 호출 -->
  <script type="module" src="./js/gallery_revise3.js"></script>
</body>

</html>