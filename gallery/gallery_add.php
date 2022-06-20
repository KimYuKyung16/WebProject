<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/gallery_add.css">
  <link rel="stylesheet" href="./navbar/navbar4.css">
  <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&family=East+Sea+Dokdo&family=Gowun+Dodum&family=Handlee&family=Nanum+Brush+Script&family=Nanum+Gothic+Coding&family=Stylish&family=Sunflower&display=swap" rel="stylesheet">
  <title>갤러리 추가</title>
</head>

<body>
  <?php include "./navbar/navbar.php" ?>
  <main>
    <form id="gallery_add_form" action="gallery_add_process.php" method="POST">
      <h1>갤러리 생성</h1>
      <hr>
      <div id="gallery_name_div">
        <p>갤러리 이름</p>
        <input name="gallery_name" class="gallery_add_list" id="gallery_name" type="text">
      </div>
      <div id="gallery_date_div">
        <p>전시 기간</p>
        <input id="date" name="date" class="gallery_add_list" type="date">
      </div>
    
      <input id="save_btn" type="button" value="저장">
    </form>
  </main>
</body>

<script type="module" src="./js/gallery_add2.js"></script>


</html>