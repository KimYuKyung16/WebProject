<?php
header('Content-Type: charset=utf-8'); 
session_start();


$date = date("Y.m.d"); # 날짜
$time = date("H:i:s"); # 시간

$num = $_POST['num']; # 현재 게시글 번호
$title = $_POST['title']; # 글 제목
$content = $_POST['content']; # 글 내용
$board_select = $_POST['board_select']; # 글을 작성할 게시판

$conn = mysqli_connect('localhost', 'kyk', '3909', 'plant_db');

$sql = "UPDATE total_content_list 
        SET title = '{$title}', content = '{$content}', board = '{$board_select}'
        WHERE num= '{$num}'"; 

$result = mysqli_query($conn, $sql);

if ($result === false) { # sql 결과에 오류가 있을 경우
  echo "저장 오류";
  echo mysqli_error($conn);
} else { # sql 결과에 오류가 없을 경우 : 원래 수정하던 게시글로 이동
  echo "<script>location.replace('read.php?num=".$num."');</script>"; 
}

?>