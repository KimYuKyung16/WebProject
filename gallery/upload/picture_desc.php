<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="picture_desc4.css">
  <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nanum+Gothic+Coding&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&family=East+Sea+Dokdo&family=Gowun+Dodum&family=Handlee&family=Nanum+Brush+Script&family=Nanum+Gothic+Coding&family=Stylish&family=Sunflower&display=swap" rel="stylesheet">  <title>Document</title>
</head>

<body>
  <!-- 타이틀 -->
  <header id="title_div">
    <h1 id="title2">Gallery</h1>
  </header>

  <?php
  session_start();
  $picture_num = $_GET['picture_num'];
  $picture_src = "add.JPG";

  // echo $picture_num;

  header('Content-Type: charset=utf-8');
  $conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
  $sql = "
    SELECT * FROM pictures WHERE 
    u_id = '{$_SESSION['id']}' and picture_num = $picture_num ";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_array($result)) {
    $picture_src =  $row['picture'];
    $picture_title = $row['title'];
    $picture_content = $row['content'];
  }

  ?>

  <main>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <form action="picture_delete.php?picture_num=<?= $picture_num ?>" id="delete_form" method="POST">
            <h1 class="modal-title text-center">작품<?=$picture_num?> 설정하기</h5>
            <input id="delete-btn" type="button" value="작품 삭제">
          </form>
        </div>
        <form action="picture.php?picture_num=<?= $picture_num ?>" id="save_img_form" method="POST" enctype="multipart/form-data">
          <div class="modal-body text-center">
            <button type="button" class="close close_modal" id="close_modal_btn2" style="display: none;">
              <span aria-hidden="true">&times;</span>
            </button>
            <img id="backImg" src="../image/<?= $picture_src ?>" alt="profile" width="600" height=auto>
            <div class="back">
              <img id="frontImg" src="../image/pic_add_btn.png" alt="profile" width="180" height="40">
              <input class="inputfile" accept=".jpg, .jpeg, .png" style="display: none;" type="file" value="1" name="a_file">
              <button type="button" class="save_btn" id="modal_okay_btn">저장</button>
              <!-- 사진 저장하는 버튼 -->
            </div>
          </div>
        </form>
      </div>


      <div id="pic_info-div">
        <form action="picture.php?picture_num=<?= $picture_num ?>" id="save_img_form" method="POST">
            <div id="pic_title_div">
              <p>제목 입력</p>
              <input id="title" type="text" name="title" value="<?= $picture_title ?>">
            </div>

            <div id="pic_content_div">
              <p>내용 입력</p>
              <textarea id="content" name="content" required><?= $picture_content ?></textarea>
            </div>
            <div id="btn-div"> <!-- 제목, 내용 저장하는 버튼 -->
              <button type="submit" class="save_btn" id="save_btn">저장</button>
            </div>   
          </div>   
        </form>
      </div>
  </main>



  <!--js파일 호출 -->
  <script type="module" src="image3.js"></script>
  <script type="module" src="picture_desc1.js"></script>
</body>

</html>