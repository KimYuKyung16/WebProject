<?php header('Content-Type: charset=utf-8'); ?>

<header class="main_title">
  <h1 id="main_title">Plant Community</h1>
  <div class="navbar_togglebBtn">
      <i class="fas fa-bars"></i>
  </div>
</header>

<nav class="navbar">
  <!-- <div class="navbar_logo">
      <i class="fas fa-street-view"></i>
      <p>Ireum</p>
  </div> -->
  <ul class="navbar_menu">
      <li><a href="#">식물 기본 정보</a></li>
      <li><a href="plant_info_share.php">식물 정보 공유</a></li>
      <li><a href="introduce_plant.php">내 식물 자랑</a></li>
  </ul>
  <ul class="navbar_icons">
      <!-- <form action="login_confirm.php" id="page_num_form" method="POST"> -->
      <li><i id="my_info" class="fas fa-user-circle fa-lg"></i></li>
      <input type="hidden" name="page_num" id="page_num" value="my_info">
      <!-- </form> -->
  </ul>
</nav>