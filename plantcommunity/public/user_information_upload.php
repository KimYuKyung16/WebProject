<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>


<?php
header('Content-Type: charset=utf-8'); 

/* 사용자 프로필 파일 설정 관련 */

$email = $_POST['email']; // 이메일 POST로 받아오기
$nickname = $_POST['nickname']; // 닉네임 POST로 받아오기

$conn = mysqli_connect('localhost', 'kyk', '3909', 'plant_db'); // db_connect

$sql = "SELECT * FROM users WHERE email = '{$email}'";
$result = mysqli_query($conn, $sql);

$profile_file_src = './profile/'; // upload할 파일경로
$profile_name = date('Y_m_d_his', time()).".JPG"; // 실제로 저장할 profile 이름

// $_FILE은 파일관련 초전역변수
// $_FILES['profile_file']['tmp_name'] : 웹 서버에 임시로 저장된 파일의 위치
if (move_uploaded_file($_FILES['profile_file']['tmp_name'], $profile_file_src.$profile_name)) { // 파일 받아오기 성공했을 때
  if ($row = mysqli_fetch_array($result)) { // users에 내 계정이 있으면
    $sql = "UPDATE users SET profile = '{$profile_name}' WHERE email= '{$email}'"; 
    $result = mysqli_query($conn, $sql);
    header("location: login_confirm.php?page_value=profile");
  } else { // user에 내 계정이 없으면
    echo "오류. 계정 정보가 없습니다.";
    header("location: user_information.php");
  }

} else { // 파일 받아오기 실패했을 때
  echo "오류. 파일을 받아오는 데에 실패했습니다.";
}


/* 사용자 닉네임 설정 관련 */

if ($nickname != null) { // 닉네임 값 받아오기 성공했을 때
  if ($row = mysqli_fetch_array($result)) { // users에 내 계정이 있으면
    $sql = "UPDATE users SET nickname = '{$nickname}' WHERE email= '{$email}'";
    $result = mysqli_query($conn, $sql);
    header("location: login_confirm.php?page_value=nickname");
  } else { // users에 내 계정이 없으면
    echo "오류. 계정 정보가 없습니다.";
    header("location: user_information.php");
  }
    
} else { // 닉네임 값 받아오기 실패했을 때
  echo '오류. 닉네임 값을 받아오는 데에 실패했습니다.';
}

?>


