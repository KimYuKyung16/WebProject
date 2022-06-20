<?php
/* paging : 이전 페이지 */
if ($page <= 1) { ?>
  <a href="plant_info_share.php?page=1"><input type="button" value="<"></a>
<?php 
} else { ?>
  <a href="plant_info_share.php?page=<?php echo ($page-1); ?>"><input type="button" value="<"></a>
<?php 
}; ?>

<?php
/* pager : 페이지 번호 출력 */
for ($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++) { ?>
  <a href="plant_info_share.php?page=<?php echo $print_page; ?>"><input type="button" value=<?=$print_page; ?>></a>
<?php 
}; ?>

<?php
/* paging : 다음 페이지 */
if ($page >= $total_page) {
?>
  <a href="plant_info_share.php?page=<?php echo $total_page; ?>"><input type="button" value=">"></a>
<?php 
} else { ?>
  <a href="plant_info_share.php?page=<?php echo ($page+1); ?>"><input type="button" value=">"></a>
<?php 
}; ?>