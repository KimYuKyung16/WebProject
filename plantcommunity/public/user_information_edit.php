<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>유저 정보 수정 페이지</title>

    <link rel="stylesheet" href="./css/main4.css">
    <link rel="stylesheet" href="./css/user_information_edit.css">

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@900&family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e8028249b4.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php 
  header('Content-Type: charset=utf-8'); 
  session_start();
  include "./main_title/title.php"; // 메인타이틀, 네비게이션바 추가
  
  $email = $_SESSION['id'];

  $conn = mysqli_connect('localhost', 'kyk', '3909', 'plant_db');
  $sql = "SELECT * FROM users WHERE email='{$email}' "; 
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_array($result)) {
    $profile =  $row['profile']; // 유저의 프로필 사진 이름 
    $nickname = $row['nickname']; // 유저의닉네임
  }
  ?>

  <div class="my_info_edit">
    <div class="my_info_content">

      <div>
        <h1>내 정보 설정</h1>
      </div>

      <!-- 프로필 사진 보내는 폼 : 파일 보낼때는 enctype을 multipart/form-data로 설정 -->
      <form action="user_information_upload.php" id="user_info_save_form" method="POST" enctype="multipart/form-data">
        <div class="profile_select_div"> <!-- 프로필 선택 div -->
          <img id="selected_profile" src="./profile/<?=$profile?$profile:"other.JPG"?>" alt="profile" width="300" height="300"> <!--선택된 프로필 사진 -->
          <div class="profile_file_select_div"> <!-- 프로필 파일 -->
            <img id="profile_select_btn" src="./image/profile_btn.png" alt="profile" width="300" height="60"> <!-- 파일 선택 -->
            <input type="file" class="inputfile" accept=".jpg, .jpeg, .png" style="display: none;" value="1" name="profile_file"> <!-- 파일 선택 -->
          </div>
        </div>
        <input type="hidden" name="email" id="email" value="<?=$_POST['email']?>">
        <input type="button" class="save_btn" id="profile_save_btn" value="프로필 저장"> <!-- 프로필 저장하는 버튼 -->
      </form>

      <!-- 닉네임 보내는 폼 -->
      <form action="user_information_upload.php" id="user_info_save_form2" method="POST"> 
          <div class="nickname_div"> <!-- 닉네임 저장 div -->
            <Label for="nickname">닉네임: </Label>
            <input id="nickname" type="text" name="nickname" value="<?=$nickname?>">
          </div> 
        <input type="hidden" name="email" id="email" value="<?=$_POST['email']?>">
        <input type="button" class="save_btn" id="nickname_save_btn" value="닉네임 저장"> <!-- 닉네임 저장하는 버튼 -->
      </form> 

    </div>
  </div>

  <script type="module" src="./js/user_information_edit.js"></script>
</body>
</html>


