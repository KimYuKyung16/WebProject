<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../navbar/navbar4.css">
    <link rel="stylesheet" href="./signup1.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous"> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script> -->
</head>

<body>

  <?php include "../navbar/navbar.php"?>  <!-- 네비게이션 바 부분 -->

  
  <form action="signupProcess.php" method="POST" id="signup_form">
    <div class="signup_list_div">
      <h2>회원가입</h2>
      <hr noshade color="#BDBDBD">
      <div class="mb_3">
        <label for="id" class="form_label">아이디</label>
        <input id="id" class="form_control" name="id" type="text" placeholder="아이디 입력">
      </div>
      <div class="mb_3">
        <label for="pw" class="form_label">비밀번호</label>
        <input id="pw" class="form_control" name="pw" type="password" placeholder="비밀번호 입력">
      </div>
      <div class="mb_3">
        <label for="pw_check" class="form_label">비밀번호 확인</label>
        <input id="pw_check" class="form_control" name="pw_check" type="password" placeholder="비밀번호 확인">
      </div>
      <button id="signup_confirm_btn" class="signup_confirm_btn" type="button">회원가입</button>
      
      <div class="bottomText">
        <p>계정이 있다면 <a href="./login.php">로그인</a> 해주세요</p>
      </div>  
    
    </div>

  </form>


</body>
<script type="module" src="./signup.js"></script>
<script type="module" src="./login.js"></script>
</html>