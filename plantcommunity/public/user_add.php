<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
session_start(); //내가 세션을 위해서 따로 추가한 부분
header('Content-Type: charset=utf-8'); 

/* 세션을 위해서 추가한 코드 */
$_SESSION['id'] = $_POST['email'];

/* 세션 확인을 위해서 추가한 코드 */
// if (isset($_SESSION['id'])) { //로그인O
//   $login_bool = 1; 
// } else { //로그인X
//   $login_bool = 0;
// }


$email = $_POST['email']; # 현재 로그인 되어 있는 이메일
$email_id = explode("@", $email); # 닉네임 default 값

$conn = mysqli_connect('localhost', 'kyk', '3909', 'plant_db');

$sql = "SELECT * FROM users WHERE email = '{$_POST['email']}' ";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);

if ($row['email']) { # 이미 계정이 등록되어 있는 경우 : 메인화면으로 이동
  echo "<script>location.replace('index2.php');</script>"; 
} else { # 계정이 등록되어 있지 않은 경우 : 계정 생성 (닉네임 default 값: 본인 이메일의 앞 부분)
  $sql = "INSERT INTO users (email, nickname) VALUES('$email', '$email_id[0]') ";
}

$result = mysqli_query($conn, $sql);

if ($result === false) { # sql 결과에 오류가 있을 경우
  echo "저장 오류";
  echo mysqli_error($conn);
} else {  # sql 결과에 오류가 없을 경우 : 메인 화면으로 이동
  echo "<script>location.replace('index2.php');</script>"; 
}

?>

