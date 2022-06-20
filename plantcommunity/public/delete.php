<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>삭제 페이지</title>
</head>
<body>
<?php
  header('Content-Type: charset=utf-8');
  $num = $_POST['num'];

  $conn = mysqli_connect('localhost', 'kyk', '3909', 'plant_db');

  $sql = "DELETE FROM total_content_list WHERE num = '{$num}' ";
  $result = mysqli_query($conn, $sql);

  if ($result === false) { # sql 결과에 오류가 있을 경우
    echo "저장 오류";
    echo mysqli_error($conn);
  } else { # sql 결과에 오류가 없을 경우
    echo "<script>location.replace('plant_info_share.php');</script>"; 
  }
  
?>
</body>
</html>