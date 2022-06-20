<!-- 이전 페이지 : '<' -->
<?php
if ($page <= 1) { ?> <!-- 제일 처음 페이지라면 '<'버튼 출력X --> 
<?php 
} else { ?>
  <form action="index2.php?page=<?=($page-1); ?>" id="write_form" method="POST">
    <input type="submit" value="<">
    <input type="hidden" name="email" value=<?=$_POST['email']?>>
  </form>
<?php 
}; ?>

<!-- 페이지 번호 출력 : 1,2,3 ... -->
<?php
for ($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++) { ?>
  <form action="index2.php?page=<?php echo $print_page; ?>" id="write_form" method="POST">
    <input type="submit" value=<?=$print_page; ?>>
    <input type="hidden" name="email" value=<?=$_POST['email']?>>
  </form>
<?php 
}; ?>

<!-- 다음 페이지 : '>' -->
<?php
if ($page >= $total_page) { ?> <!-- 제일 마지막 페이지라면 '>'버튼 출력X --> 
<?php 
} else { ?>
  <form action="index2.php?page=<?=($page+1); ?>" id="write_form" method="POST">
    <input type="submit" value=">">
    <input type="hidden" name="email" value=<?=$_POST['email']?>>
  </form>
<?php 
}; ?>