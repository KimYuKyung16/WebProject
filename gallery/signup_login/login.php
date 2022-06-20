<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../navbar/navbar4.css">
  <link rel="stylesheet" href="./login1.css">
  <title>LOGIN</title>
</head>
<body>

  <?php include "../navbar/navbar.php"?>  <!-- 네비게이션 바 부분 -->

  <form id="login-Form" action="check_login.php" method="POST">
      <div class="login_list-Div">
        <h2>로그인</h2>
        <hr noshade color="#BDBDBD">
        <div class="login-2">
          <label for="id" class="form_label">아이디</label>
          <input id="id" class="form_control" name="id"  type="text" placeholder="아이디">
        </div>
        <div class="login-2">
          <label for="pw" class="form_label">비밀번호</label>
          <input id="pw" class="form_control" name="pw" type="password" placeholder="비밀번호">
        </div>
        <button id="login_confirm_btn"type="submit" class="btn">로그인 하기</button>

        <div class="bottomText">
          <p>계정이 없다면 <a href="signup.php">Sign up</a><p>
        </div>

      </div>
  </form>


</body>
<script type="module" src="./login.js"></script>
</html>