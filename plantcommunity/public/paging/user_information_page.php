<?php
/* paging : 이전 페이지 */
if ($page <= 1) { ?>
  <!-- <a href="user_information.php?page=1"><input type="button" value="<"></a> -->
  <form action="user_information.php?page=1" id="write_form" method="POST">
    <input type="submit" value="<">
    <input type="hidden" name="email" value=<?=$_POST['email']?>>
  </form>
<?php 
} else { ?>
  <!-- <a href="user_information.php?page=<?php echo ($page-1); ?>"><input type="button" value="<"></a> -->
  <form action="user_information.php?page=<?php echo ($page-1); ?>" id="write_form" method="POST">
    <input type="submit" value="<">
    <input type="hidden" name="email" value=<?=$_POST['email']?>>
  </form>
<?php 
}; ?>

<?php
/* pager : 페이지 번호 출력 */
for ($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++) { ?>
  <!-- <a href="user_information.php?page=<?php echo $print_page; ?>"><input type="button" value=<?=$print_page; ?>></a> -->
  <form action="user_information.php?page=<?php echo $print_page; ?>" id="write_form" method="POST">
    <input type="submit" value=<?=$print_page; ?>>
    <input type="hidden" name="email" value=<?=$_POST['email']?>>
  </form>
<?php 
}; ?>

<?php
/* paging : 다음 페이지 */
if ($page >= $total_page) {
?>
  <!-- <a href="user_information.php?page=<?php echo $total_page; ?>"><input type="button" value=">"></a> -->
  <form action="user_information.php?page=<?php echo $total_page; ?>" id="write_form" method="POST">
    <input type="submit" value=">">
    <input type="hidden" name="email" value=<?=$_POST['email']?>>
  </form>
<?php 
} else { ?>
  <!-- <a href="user_information.php?page=<?php echo ($page+1); ?>"><input type="button" value=">"></a> -->
  <form action="user_information.php?page=<?php echo ($page+1); ?>" id="write_form" method="POST">
    <input type="submit" value=">">
    <input type="hidden" name="email" value=<?=$_POST['email']?>>
  </form>
<?php 
}; ?>