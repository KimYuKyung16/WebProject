<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<?php
header('Content-Type: charset=utf-8'); 
session_start();


$date = date("Y.m.d"); # 날짜
$time = date("H:i:s"); # 시간

$email = $_SESSION['id']; # 작성자의 이메일
$title = $_POST['title']; # 글 제목
$content = $_POST['content']; # 글 내용
$board_select = $_POST['board_select']; # 글을 작성할 게시판

# 현재 로그인 된 이메일의 닉네임을 select로 추출해서 글 쓸 때 작성자로 insert
$conn = mysqli_connect('localhost', 'kyk', '3909', 'plant_db');
$sql = "SELECT * FROM users WHERE email = '{$email}'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result); 
$nickname = $row['nickname']; # 작성자의 닉네임

$sql = "
  INSERT INTO total_content_list
  (email, writer, title, content, date, time, board)
  VALUES('{$email}', '{$nickname}', '{$title}', '{$content}', '{$date}', '{$time}','{$board_select}') ";


$result = mysqli_query($conn, $sql);

if ($result === false) { # sql 결과에 오류가 있을 경우
  echo "저장 오류";
  echo mysqli_error($conn);
} else { # sql 결과에 오류가 없을 경우 : 식물 정보 공유 게시판으로 이동
  echo "<script>location.replace('plant_info_share.php');</script>"; 
}

?>

