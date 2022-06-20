<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title></title>
</head>
<body>

<?php
session_start(); 
header('Content-Type: charset=utf-8'); 

$picture_num = $_GET['picture_num'];
$title = $_POST['title'];
$content = $_POST['content'];


$conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
$profileImage = $dirName.$_FILES['a_file']['name'];

$uploaddir = '../image/';
$name1 = date('Y_m_d_his', time()).".JPG";

if (move_uploaded_file($_FILES['a_file']['tmp_name'],$uploaddir.$name1)) {
    echo 'sucess';
    $count  = 0;

    $sql = "
        SELECT * FROM pictures WHERE 
        u_id = '{$_SESSION['id']}' and picture_num = '$picture_num' ";
    $result = mysqli_query($conn, $sql);
   

    while($row = mysqli_fetch_array($result)){
        $count ++;
     }

    if ($count == 0){
        echo "값 없다";
        $sql = "
            INSERT INTO pictures
            (u_id, picture_num, picture)
            VALUES('{$_SESSION['id']}', '{$picture_num}', '{$name1}')";
        $result = mysqli_query($conn, $sql);
        if ($result === false) {
            echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
            echo mysqli_error($conn);
        }
        header("location: picture_desc.php?picture_num=$picture_num");
    }else{
        echo "값 있다";
        $sql = "
            UPDATE pictures SET
            picture = '{$name1}'
            WHERE u_id = '{$_SESSION['id']}' and picture_num = '$picture_num'
            ";
        $result = mysqli_query($conn, $sql);
        header("location: picture_desc.php?picture_num=$picture_num");
    }
}
else{
    echo 'fail';
}

?>

<!-- 제목, 내용 넘겼을 때 -->
<?php
if ($title != null) {
    echo 'sucess';
    $count  = 0;

    $sql = "
        SELECT * FROM pictures WHERE 
        u_id = '{$_SESSION['id']}' and picture_num = '$picture_num' ";
    $result = mysqli_query($conn, $sql);
   

    while($row = mysqli_fetch_array($result)){
        $count ++;
     }

    if ($count == 0){
        echo "값 없다";
        $sql = "
            INSERT INTO pictures
            (u_id, picture_num, title, content)
            VALUES('{$_SESSION['id']}', '{$picture_num}', '{$title}', '{$content}')";
        $result = mysqli_query($conn, $sql);
        if ($result === false) {
            echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
            echo mysqli_error($conn);
        }
        header("location: picture_desc.php?picture_num=$picture_num");
    }else{
        echo "값 있다";
        $sql = "
            UPDATE pictures SET
            title = '{$title}', content = '{$content}'
            WHERE u_id = '{$_SESSION['id']}' and picture_num = '$picture_num'
            ";
        $result = mysqli_query($conn, $sql);
        header("location: picture_desc.php?picture_num=$picture_num");
    }
}
else{
    echo 'fail';
}

?>

 

</body>

